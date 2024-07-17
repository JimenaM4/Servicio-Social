<?php
function verificarContrasena($contrasena,$sal,$hashGuardado)
{
    $caracteres=str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
    for($i=0;$i<count($caracteres);$i++)
    {
        for($j=0;$j<count($caracteres);$j++)
        { 
            for($k=0;$k<count($caracteres);$k++)
            {
                for($l=0;$l<count($caracteres);$l++)
                {
                    $pimienta=$caracteres[$l].$caracteres[$k].$caracteres[$j].$caracteres[$i];
                    if(hash('sha256',$contrasena.$pimienta.$sal)===$hashGuardado)
                    {
                        return true;
                    }
                }
            }
        }
    }
    return false;
}


require "config.php";
$conexion = connect();
if (!$conexion)
    echo "No se pudo conectar con la base";
else
{
    //obtención valores
    $usuario=(isset($_POST["usuario"])&&$_POST["usuario"]!="")?$_POST["usuario"]:false;
    $contrasena=(isset($_POST["contrasena"])&&$_POST["contrasena"]!="")?$_POST["contrasena"]:false;
    $contrasenaNueva=(isset($_POST["contrasenaNew"])&&$_POST["contrasenaNew"]!="")?$_POST["contrasenaNew"]:false;

    //sanitización valores
    $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
    $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
    $contrasenaNueva=filter_var($contrasenaNueva,FILTER_SANITIZE_STRING);
    //regex
    $usuarioR=preg_match('/^AdminP9T[1-100]+$/i', $usuario);
    $contrasenaR=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasena);
    $contrasenaNuevaR=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasenaNueva);

    if($usuarioR==0 || $contrasenaR==0 || $contrasenaNuevaR==0)
        $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos.");
    else
    {
        $sql = "SELECT contrasena, sal FROM administradores WHERE usuario=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $usuario); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $resp = mysqli_fetch_assoc($res);
        $sal=$resp['sal'];
        $hashGuardado=$resp['contrasena'];

        if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==false)
        {
            $respuesta = array("ok"=>false, "mensaje" => "0", "contraNueva"=>$contrasenaNueva, "contra"=>$contrasena);
        }
        else
        {
            $sal1=uniqid();
            $caracteres=str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
            $partesPimienta=array_rand($caracteres,4);
            $pimienta=$caracteres[$partesPimienta[0]].$caracteres[$partesPimienta[1]].$caracteres[$partesPimienta[2]].$caracteres[$partesPimienta[3]];
            $contrasenaConSalYPimienta=$contrasenaNueva.$pimienta.$sal1;
            $hash=hash('sha256',$contrasenaConSalYPimienta); //hasheamos la nueva contraseña

            $sql1= "UPDATE administradores SET sal= '$sal1', contrasena = '$hash' WHERE Usuario = '$usuario'"; //la actualizamos
            $res=mysqli_query($conexion, $sql1);

            $respuesta = array("ok"=>false, "mensaje" => "1", "contraNueva"=>$contrasenaNueva, "contra"=>$contrasena);

        }
    }
    echo json_encode($respuesta);
}



?>