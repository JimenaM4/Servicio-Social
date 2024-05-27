<?php
    //comprobar que los valores existan
    require "./config.php";
    $conexion = connect ();
    $usuario=(isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
    $contrasena=(isset($_POST['contrasena']) && $_POST["contrasena"] != "")? $_POST['contrasena'] : false;
    $tipoUsuario=(isset($_POST['tipoUsuario']) && $_POST["tipoUsuario"] != "")? $_POST['tipoUsuario'] : false;
    $respuesta = [];
    if ($tipoUsuario == "1"){
        //sanitizar los valores
        $usuario = filter_var($usuario,  FILTER_SANITIZE_NUMBER_INT);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        //regex
        $usuarioR = preg_match('/^[0-9]{9}$/i', $usuario);
        $contrasenaR = preg_match('/^[0-9]{8}$/i', $contrasena);//devuelve 1 si es correcto, 0 si no

        if(!$usuarioR || !$contrasenaR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
        }
        else{
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql = "SELECT * FROM alumno WHERE noCuenta = $usuario AND fechaNacimiento = $contrasena";
                $resultado = mysqli_query($conexion, $sql);

                if(!$resultado)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo iniciar sesión");
                } else{
                    if(mysqli_num_rows($resultado) === 1){
                        $row = mysqli_fetch_assoc($resultado);
                        if($row['noCuenta'] === $usuario && $row['fechaNacimiento'] === $contrasena){
                            //seteo la vida de la session en 7200 segundos    
                            ini_set("session.cookie_lifetime","7200");
                            //seteo el maximo tiempo de vida de la session
                            ini_set("session.gc_maxlifetime","7200");
                            //inicio la session  
                            session_start();
                            $_SESSION['usuario'] = $row['noCuenta'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "1");
                        }
                        else{
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                    }
                }
            }
        }
       
    }
    if ($tipoUsuario == "2"){
        //sanitizar los valores
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        //regex
        $usuarioR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $usuario);
        $contrasenaR = preg_match('/^[0-9]{5,6}$/i', $contrasena);
        if(!$usuarioR || !$contrasenaR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
        }
        else{
            $conexion = connect ();
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql = "SELECT * FROM profesores WHERE rfc = '$usuario' AND noTrabajador = $contrasena";
                $resultado = mysqli_query($conexion, $sql);
                if(!$resultado)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo iniciar sesión");
                } else{
                    if(mysqli_num_rows($resultado) === 1){
                        $row = mysqli_fetch_assoc($resultado);
                        if($row['rfc'] === $usuario && $row['noTrabajador'] === $contrasena){
                            session_start();
                            $_SESSION['usuario'] = $row['rfc'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "2");
                        }
                        else{
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                    }
                }
            }
        }
    }
    if ($tipoUsuario == "3"){
        //sanitizar los valores
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        //regex
        $usuarioR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $usuario);
        $contrasenaR = preg_match('/^[0-9]{5,6}$/i', $contrasena);
        if(!$usuarioR || !$contrasenaR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos 1");
        }
        else{
            $conexion = connect ();
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql = "SELECT * FROM tutores t, profesores p WHERE t.rfc = p.rfc AND t.rfc = ? AND p.noTrabajador = ?";
                $stmt = mysqli_prepare($conexion, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena); // "s" indica que es un parámetro de tipo string
                mysqli_stmt_execute($stmt);
                $resultado = mysqli_stmt_get_result($stmt);
                if(!$resultado)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo iniciar sesion");
                } else{
                    if(mysqli_num_rows($resultado) === 1){
                        $row = mysqli_fetch_assoc($resultado);
                        if($row['rfc'] === $usuario && $row['noTrabajador'] === (int) $contrasena){
                            session_start();
                            $_SESSION['usuario'] = $row['rfc'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "3");
                        }
                        else{
                            // $respuesta = array("ok"=>false, "mensaje"=>"Usuario o contraseña incorrecto");
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                    }
                }
            }
        }
    }
    echo json_encode($respuesta);
?>