<?php
    require "config.php";
    $conexion=connect();
    //obtención valores
    $idAdmin=(isset($_POST["idAdmin"])&&$_POST["idAdmin"]!="")?$_POST["idAdmin"]:false;
    $idAdminR=preg_match('/^[0-9]{1,11}$/', $idAdmin);
    $sql = "SELECT usuario FROM administradores WHERE idAdmin=?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $idAdmin); // "i" indica que es un parámetro de tipo entero
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $resp = mysqli_fetch_assoc($res);
    // $sal=$resp['sal'];
    // $hashGuardado=$resp['contraseña'];

    // if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==false)
    // {
    //     $respuesta=[
    //         "mensaje" => "Error con la contraseña"
    //     ];
    // }
    // else{
        $sql = "DELETE FROM administradores WHERE idAdmin=$idAdmin";
        $res = mysqli_query($conexion, $sql);
        if(!$res)
        {
            $respuesta =[
                "mensaje" => "No se pudo borrar al administrador"
            ];
        } 
        else
        {
            // $respuesta=[
            //     "usuario" => $usuario,
            //     "contrasena" => $contrasena,
            //     "mensaje" => "Administrador borrado"
            // ];
            $respuesta = array("ok"=>true, "mensaje" => "Administrador borrado");
        }
    //}
    echo json_encode($respuesta);
?>