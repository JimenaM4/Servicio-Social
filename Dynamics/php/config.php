<?php
    const DBHOST = "localhost";
    const DBUSER = "root";
    const DBPASS = "";
    const DBNAME = "tutoriasP9";

    function connect (){
        $conexion = mysqli_connect (DBHOST, DBUSER, DBPASS, DBNAME);
        mysqli_set_charset($conexion,"utf8");
        return $conexion;
    }
    
?>