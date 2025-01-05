<?php
    require "config.php";
    $conexion = connect();
    
    // Obtención de valores
    $idTrabajador = (isset($_POST["noTrabajador"]) && $_POST["noTrabajador"] != "") ? $_POST["noTrabajador"] : false;
    
    // Validación del formato del número de trabajador
    $idTrabajadorR = preg_match('/^[0-9]{1,11}$/', $idTrabajador);
    
    // Verificamos que la variable $idTrabajador esté bien definida y sea válida
    if ($idTrabajador) {
        $sql = "SELECT rfc FROM profesores WHERE noTrabajador=$idTrabajador";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "i", $idTrabajador); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $resp = mysqli_fetch_assoc($res);
        
        // Verificamos si el resultado es válido
        if ($resp) {
            $respuesta = array("ok" => true, "mensaje" => "Profesor seleccionado", "rfc" => $resp['rfc']);
        } else {
            $respuesta = array("ok" => false, "mensaje" => "No se encontró el profesor.",  "rfc" => $resp['rfc']);
        }
    } else {
        $respuesta = array("ok" => false, "mensaje" => "Número de trabajador inválido.");
    }

    echo json_encode($respuesta);
?>
