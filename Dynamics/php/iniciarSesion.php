<?php
    //comprobar que los valores existan
    require "./config.php";
    $conexion = connect ();
    $usuario=(isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
    $contrasena=(isset($_POST['contrasena']) && $_POST["contrasena"] != "")? $_POST['contrasena'] : false;
    // $RFC=(isset($_POST['RFC']) && $_POST["RFC"] != "")? $_POST['RFC'] : false;
    // $nombre=(isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : false;
    // $apePat=(isset($_POST['apePat']) && $_POST["apePat"] != "")? $_POST['apePat'] : false;
    // $apeMat=(isset($_POST['apeMat']) && $_POST["apeMat"] != "")? $_POST['apeMat'] : false;
    // $correo=(isset($_POST['correo']) && $_POST["correo"] != "")? $_POST['correo'] : false;
    // $fechaNac=(isset($_POST['fechaNac']) && $_POST["fechaNac"] != "")? $_POST['fechaNac'] : false;
    // $numTrab=(isset($_POST['numTrab']) && $_POST["numTrab"] != "")? $_POST['numTrab'] : false;
    // $grupo=(isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : false;
    // $asignatura=(isset($_POST['asignatura']) && $_POST["asignatura"] != "")? $_POST['asignatura'] : false;
    $tipoUsuario=(isset($_POST['tipoUsuario']) && $_POST["tipoUsuario"] != "")? $_POST['tipoUsuario'] : false;
    // $clave=(isset($_POST['asignatura']) && $_POST["asignatura"]!="")? $_POST['asignatura']:false;
    // $ciclo=date("Y");
    $respuesta = [];
    if ($tipoUsuario == "1"){
        //sanitizar los valores
        $usuario = filter_var($usuario,  FILTER_SANITIZE_NUMBER_INT);
        // $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        // $apePat = filter_var($apePat, FILTER_SANITIZE_STRING);
        // $apeMat = filter_var($apeMat, FILTER_SANITIZE_STRING);
        // $correo = filter_var($correo, FILTER_SANITIZE_STRING);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        // $grupo = filter_var($grupo,  FILTER_SANITIZE_NUMBER_INT);
        //regex
        $usuarioR = preg_match('/^[0-9]{9}$/i', $usuario);
        // $nombreR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i', $nombre);
        // $apePatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apePat);
        // $apeMatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apeMat);
        // $correoR = preg_match('/^[a-zA-Z0-9]+@alumno\.enp\.unam\.mx$/', $correo);
        $contrasenaR = preg_match('/^[0-9]{8}$/i', $contrasena);//devuelve 1 si es correcto, 0 si no
        // $grupoR = preg_match('/^[4-6][0-6][0-9]$/i', $grupo);
        // $fechaNac = str_replace("-", "", $fechaNac);

        // obtener id del grupo
        // $sql = "SELECT idGrupo FROM grupo WHERE grupo=?";
        // $stmt = mysqli_prepare($conexion, $sql);
        // mysqli_stmt_bind_param($stmt, "i", $grupo); // "i" indica que es un parámetro de tipo entero
        // mysqli_stmt_execute($stmt);
        // $res = mysqli_stmt_get_result($stmt);
        // $idGrupo = mysqli_fetch_assoc($res);

        if(!$usuarioR || !$contrasenaR /*|| !$apePatR || !$apeMatR || !$correoR || !$fechaNacR || !$grupoR*/)
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
                            $_SESSION['usuario'] = $row['noCuenta'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "1");
                            //$_SESSION['id'] = $row['id'];
                            // header("Location: ./Templates/principal.html");
                            // exit();
                        }
                        else{
                            // $respuesta = array("ok"=>false, "mensaje"=>"Usuario o contraseña incorrecto");
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                        // else{
                        //     header("Location: ./index.php?error=El usuario o la contraseña son incorrectos.");
                        //     exit();
                        // }
                    }
                }
            }
            // $respuesta = array("ok"=>true, "mensaje" => "1");
        }
       
    }
    if ($tipoUsuario == "2"){
        //sanitizar los valores
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        // $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        // $apePat = filter_var($apePat, FILTER_SANITIZE_STRING);
        // $apeMat = filter_var($apeMat, FILTER_SANITIZE_STRING);
        // $correo = filter_var($correo, FILTER_SANITIZE_STRING);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        //regex
        $usuarioR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $usuario);
        // $nombreR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i', $nombre);
        // $apePatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apePat);
        // $apeMatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apeMat);
        // $correoR = preg_match('/^[a-zA-Z]+\.+[a-zA-Z]+@(enp|dgenp)\.unam\.mx$/', $correo);
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
                            $_SESSION['usuario'] = $row['rfc'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "2");
                            //$_SESSION['id'] = $row['id'];
                            // header("Location: ./Templates/principal.html");
                            // exit();
                        }
                        else{
                            // $respuesta = array("ok"=>false, "mensaje"=>"Usuario o contraseña incorrecto");
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                        // else{
                        //     header("Location: ./index.php?error=El usuario o la contraseña son incorrectos.");
                        //     exit();
                        // }
                    }
                }
            }
            // $respuesta = array("ok"=>true, "mensaje" => "2");
        }
    }
    if ($tipoUsuario == "3"){
        //sanitizar los valores
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        $contrasena = filter_var($contrasena, FILTER_SANITIZE_NUMBER_INT);
        // $grupo = filter_var($grupo, FILTER_SANITIZE_NUMBER_INT);
        // $asignatura = filter_var($asignatura, FILTER_SANITIZE_STRING);
        //regex
        $usuarioR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $usuario);
        $contrasenaR = preg_match('/^[0-9]{5,6}$/i', $contrasena);
        // $grupoR = preg_match('/^[4-6][0-6][0-9]$/i', $grupo);
        // $asignaturaR = preg_match('/^[0-9]{4}$/i', $asignatura);
        // obtener id del grupo
        // $sql = "SELECT noTrabajador FROM tutores t, profesores p WHERE t.rfc = p.rfc AND t.rfc=?";
        // $stmt = mysqli_prepare($conexion, $sql);
        // mysqli_stmt_bind_param($stmt, "s", $usuario); // "s" indica que es un parámetro de tipo string
        // mysqli_stmt_execute($stmt);
        // $res = mysqli_stmt_get_result($stmt);
        // if($res)
        // {
        //     $contrasenaComprobar = mysqli_fetch_assoc($res);
        // }
        // else{
        //     $respuesta = array("ok"=>false, "mensaje" => "No se pudo conectar con la base de datos");
        // }
        // $sql = "SELECT clave FROM asignatura WHERE nombre=?";
        // // obtener clave de la asignatura
        // $stmt = mysqli_prepare($conexion, $sql);
        // mysqli_stmt_bind_param($stmt, "i", $asignatura); // "i" indica que es un parámetro de tipo entero
        // mysqli_stmt_execute($stmt);
        // $res = mysqli_stmt_get_result($stmt);
        // $clave = mysqli_fetch_assoc($res);
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
                            $_SESSION['usuario'] = $row['rfc'];
                            $_SESSION['nombre'] = $row['nombre'];
                            $_SESSION['apellido'] = $row['aPaterno'];
                            $respuesta = array("ok"=>true, "mensaje" => "3");
                            //$_SESSION['id'] = $row['id'];
                            // header("Location: ./Templates/principal.html");
                            // exit();
                        }
                        else{
                            // $respuesta = array("ok"=>false, "mensaje"=>"Usuario o contraseña incorrecto");
                            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
                        }
                        // else{
                        //     header("Location: ./index.php?error=El usuario o la contraseña son incorrectos.");
                        //     exit();
                        // }
                    }
                }
            }
            // $respuesta = array("ok"=>true, "mensaje" => "Tutor registrado correctamente");
        }
    }
    echo json_encode($respuesta);
?>