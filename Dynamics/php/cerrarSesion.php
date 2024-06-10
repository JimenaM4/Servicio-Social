<?php
    session_start();
    session_unset();
    session_destroy();
    $respuesta =[
        "mensaje" => "Sesion cerrada correctamente"
    ];
    echo json_encode($respuesta);
?>