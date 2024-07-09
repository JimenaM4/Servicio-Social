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

    //obtención valores
    $usuario=(isset($_POST["usuario"])&&$_POST["usuario"]!="")?$_POST["usuario"]:false;
    $contrasena=(isset($_POST["contrasena"])&&$_POST["contrasena"]!="")?$_POST["contrasena"]:false;

    //sanitización valores
    $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
    $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
    //regex
    $usuarioR = preg_match('/^AdminP9T\d+$/', $usuario);
    $contrasenaR=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasena);

    if($contrasenaR==0||$usuarioR==0)
    {
        $respuesta=[
            "mensaje"=>"El usuario o contraseña no cumplen los requisitos"
        ];
    }
    else
    {
        // obtener sal y hash guardados en la bd
        $sql = "SELECT contraseña, sal FROM administradores WHERE usuario=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $usuario); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $resp = mysqli_fetch_assoc($res);

        if (!$resp) {
            $respuesta = [
                "mensaje" => "El usuario no existe"
            ];
        }else{
        $sal=$resp['sal'];
        $hashGuardado=$resp['contraseña'];
        
        if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==false)
        {
            $respuesta=[
                "mensaje" => "La contraseña es incorrecta"
            ];
        }
        else{
            $sql = "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$hashGuardado'";
            $res = mysqli_query($conexion, $sql);
            if(!$res)
            {
                $respuesta =[
                    "mensaje" => "Usuario o contraseña incorrectos, compruebe los datos"
                ];
            } 
            else
            {
                if(mysqli_num_rows($res) === 1)
                {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                }
                $respuesta=[
                    "usuario" => $usuario,
                    "contrasena" => $contrasena,
                    "mensaje" => "correcto"
                ];
            }
        }
    }
}
    echo json_encode($respuesta);
?>


