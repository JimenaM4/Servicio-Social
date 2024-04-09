
<?php
    //comprobar que los valores existan
    require "./config.php";
    $conexion = connect ();
    $numCuenta=(isset($_POST['numCuen']) && $_POST["numCuen"] != "")? $_POST['numCuen'] : false;
    $RFC=(isset($_POST['RFC']) && $_POST["RFC"] != "")? $_POST['RFC'] : false;
    $nombre=(isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : false;
    $apePat=(isset($_POST['apePat']) && $_POST["apePat"] != "")? $_POST['apePat'] : false;
    $apeMat=(isset($_POST['apeMat']) && $_POST["apeMat"] != "")? $_POST['apeMat'] : false;
    $correo=(isset($_POST['correo']) && $_POST["correo"] != "")? $_POST['correo'] : false;
    $fechaNac=(isset($_POST['fechaNac']) && $_POST["fechaNac"] != "")? $_POST['fechaNac'] : false;
    $numTrab=(isset($_POST['numTrab']) && $_POST["numTrab"] != "")? $_POST['numTrab'] : false;
    $grupo=(isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : false;
    $asignatura=(isset($_POST['asignatura']) && $_POST["asignatura"] != "")? $_POST['asignatura'] : false;
    $usuario=(isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
    $clave=(isset($_POST['asignatura']) && $_POST["asignatura"]!="")? $_POST['asignatura']:false;
    $ciclo=date("Y");
    $respuesta = [];
    if ($usuario == "1"){
        //sanitizar los valores
        $numCuenta = filter_var($numCuenta,  FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apePat = filter_var($apePat, FILTER_SANITIZE_STRING);
        $apeMat = filter_var($apeMat, FILTER_SANITIZE_STRING);
        $correo = filter_var($correo, FILTER_SANITIZE_STRING);
        $fechaNac = filter_var($fechaNac, FILTER_SANITIZE_STRING);
        $grupo = filter_var($grupo,  FILTER_SANITIZE_NUMBER_INT);
        //regex
        $numCuentaR = preg_match('/^[0-9]{9}$/i', $numCuenta);
        $nombreR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i', $nombre);
        $apePatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apePat);
        $apeMatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apeMat);
        $correoR = preg_match('/^[a-zA-Z0-9]+@alumno\.enp\.unam\.mx$/', $correo);
        $fechaNacR = preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/i', $fechaNac);//devuelve 1 si es correcto, 0 si no
        $grupoR = preg_match('/^[4-6][0-6][0-9]$/i', $grupo);
        $fechaNac = str_replace("-", "", $fechaNac);

        // obtener id del grupo
        $sql = "SELECT idGrupo FROM grupo WHERE grupo=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $grupo); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $idGrupo = mysqli_fetch_assoc($res);

        if(!$numCuentaR || !$nombreR || !$apePatR || !$apeMatR || !$correoR || !$fechaNacR || !$grupoR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
        }
        else{
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql = "INSERT INTO alumno (noCuenta, idGrupo, nombre, aPaterno, aMaterno, correo, fechaNacimiento, ciclo) VALUES ($numCuenta, {$idGrupo['idGrupo']}, '$nombre', '$apePat', '$apeMat', '$correo', '$fechaNac', $ciclo)";
                $res = mysqli_query($conexion, $sql);
                if(!$res)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo añadir el alumno");
                } else{
                    $respuesta = array("ok"=>true, "mensaje" => "Alumno registrado correctamente");
                }
            }
            $respuesta = array("ok"=>true, "mensaje" => "Alumno registrado correctamente");
        }
       
    }
    if ($usuario == "2"){
        //sanitizar los valores
        $RFC = filter_var($RFC, FILTER_SANITIZE_STRING);
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $apePat = filter_var($apePat, FILTER_SANITIZE_STRING);
        $apeMat = filter_var($apeMat, FILTER_SANITIZE_STRING);
        $correo = filter_var($correo, FILTER_SANITIZE_STRING);
        $numTrab = filter_var($numTrab, FILTER_SANITIZE_NUMBER_INT);
        //regex
        $RFCR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $RFC);
        $nombreR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,30})?$/i', $nombre);
        $apePatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apePat);
        $apeMatR = preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{3,30}$/i', $apeMat);
        $correoR = preg_match('/^[a-zA-Z]+\.+[a-zA-Z]+@(enp|dgenp)\.unam\.mx$/', $correo);
        $numTrabR = preg_match('/^[0-9]{5,6}$/i', $numTrab);
        if(!$RFCR || !$nombreR || !$apePatR || !$apeMatR || !$correoR || !$numTrabR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
        }
        else{
            $conexion = connect ();
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql =  "INSERT INTO profesores (rfc, nombre, aPaterno, aMaterno, correo, noTrabajador) VALUES ('$RFC', '$nombre', '$apePat', '$apeMat', '$correo', $numTrab)";
                $res = mysqli_query($conexion, $sql);
                if(!$res)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo añadir el profesor");
                } else{
                    $respuesta = array("ok"=>true, "mensaje" => "Profesor registrado correctamente");
                }
            }
            $respuesta = array("ok"=>true, "mensaje" => "Profesor registrado correctamente");
        }
    }
    if ($usuario == "3"){
        //sanitizar los valores
        $RFC = filter_var($RFC, FILTER_SANITIZE_STRING);
        $grupo = filter_var($grupo, FILTER_SANITIZE_NUMBER_INT);
        $asignatura = filter_var($asignatura, FILTER_SANITIZE_STRING);
        //regex
        $RFCR = preg_match('/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/i', $RFC);
        $grupoR = preg_match('/^[4-6][0-6][0-9]$/i', $grupo);
        $asignaturaR = preg_match('/^[0-9]{4}$/i', $asignatura);
        // obtener id del grupo
        $sql = "SELECT idGrupo FROM grupo WHERE grupo=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $grupo); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $idGrupo = mysqli_fetch_assoc($res);
        $sql = "SELECT clave FROM asignatura WHERE nombre=?";
        // // obtener clave de la asignatura
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $asignatura); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $idAsignatura = mysqli_fetch_assoc($res);
        if(!$RFCR || !$grupoR || !$asignaturaR)
        {
            $respuesta = array("ok"=>false, "mensaje" => "Los datos no son correctos");
        }
        else{
            $conexion = connect ();
            if(!$conexion)
            {
                echo "No se puedo conectar la base";
            }else{
                $sql =  "INSERT INTO tutores (idTutor, rfc, idGrupo, clave, ciclo) VALUES (NULL, '$RFC', {$idGrupo['idGrupo']}, {$idAsignatura['clave']}, $ciclo)";
                $res = mysqli_query($conexion, $sql);
                if(!$res)
                {
                    $respuesta = array("ok"=>false, "mensaje" => "No se pudo añadir el tutor");
                } else{
                    $respuesta = array("ok"=>true, "mensaje" => "Tutor registrado correctamente");
                }
            }
            $respuesta = array("ok"=>true, "mensaje" => "Tutor registrado correctamente");
        }
    }
    echo json_encode($respuesta);
?>
