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
    // $usuarioR=preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,12}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,12})?$/i', $usuario);
    $usuarioR = preg_match('/^AdminP9T[1-100]+$/i', $usuario);
    // $contrasenaR=preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,250}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,250})?$/i', $contrasena);
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
        $sal=$resp['sal'];
        $hashGuardado=$resp['contraseña'];

        if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==false)
        {
            $respuesta=[
                "mensaje" => "Error con la contraseña"
            ];
        }
        else{
            $sql = "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$hashGuardado'";
            $res = mysqli_query($conexion, $sql);
            if(!$res)
            {
                $respuesta =[
                    "mensaje" => "Usuario o contraseña equivocado"
                ];
            } 
            else
            {
                if(mysqli_num_rows($res) === 1)
                {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    // //seteo la vida de la session en 7200 segundos    
                    // ini_set("session.cookie_lifetime","7200");
                    // //seteo el maximo tiempo de vida de la session
                    // ini_set("session.gc_maxlifetime","7200");
                    // //inicio la session  
                    // session_start();
                    // $_SESSION['usuario'] = $row['usuario'];
                    // $_SESSION['id'] = $row['idAdmin'];
                }
                $respuesta=[
                    "usuario" => $usuario,
                    "contrasena" => $contrasena,
                    "mensaje" => "correcto"
                ];
            }
        }
    }
    echo json_encode($respuesta);
?>


