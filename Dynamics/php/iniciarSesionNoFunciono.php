<?php
session_start();
    require "./config.php";
    $conexion = connect ();
    if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
        function validar($datos)
        {
            $datos = trim($datos);
            $datos = stripslashes($datos);
            $datos = htmlspecialchars($datos);
            return $datos;
        }
        $usuario = validar($_POST['usuario']);
        $contrasena = validar($_POST['contrasena']);
        
        if(empty($usuario)){
            header("Location: ../index.php?error=El usuario es requerido.");
            exit()
        }else if(empty($contrasena)){
            header("Location: ../index.php?error=La contraseña es requerida.");
            exit()
        }else{
            // $contrasena = md5($contrasena);
            $sql = "SELECT * FROM alumno WHERE noCuenta = '$usuario' AND fechaNacimiento = $contrasena";
            $resultado = mysqli_query($conexion, $sql);

            if(mysqli_num_rows($resultado) === 1){
                $row = mysqli_fetch_assoc($resultado);
                if($row['noCuenta'] === $usuario && $row['fechaNacimiento'] === $contrasena){
                    $_SESSION['usuario'] = $row['noCuenta'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['apellido'] = $row['aPaterno'];
                    //$_SESSION['id'] = $row['id'];
                    header("Location: ../Templates/principal.html");
                    exit();
                }else{
                    header("Location: ../index.php?error=El usuario o la contraseña son incorrectos.");
                    exit();
                }    
            }else{
                header("Location: ../index.php?error=El usuario o la contraseña son incorrectos.");
                exit();
            }  
        }
    }else{
        header("Location: ../index.php");
        exit();
    }