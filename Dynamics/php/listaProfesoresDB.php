<?php 
    require "./config.php";
    $conexion= connect();
    if (!$conexion){ 
        echo "no se conecto con la base";
    }
    else{
        $noTrabajador = "SELECT noTrabajador FROM profesores"; 
        $res_id = mysqli_query($conexion, $noTrabajador);
        $arregloid=[]; 
        while($row=mysqli_fetch_assoc($res_id)) //mete todos los id´s recibidos en un arreglo
        {
            $arregloid[] = $row["noTrabajador"]; //todos los id
        }
        
        //var_dump($arregloid);
        
        
        $arregloinfo=[];
        foreach($arregloid as $localidad=>$valor)//recorre el arreglo de id´s y a su vez va metiendo en otro arreglo la información que llega de la petición creando así un arreglo donde cada localidad representa un registro 
        {
            $peticion = "SELECT nombre, aPaterno, aMaterno, correo FROM profesores WHERE noTrabajador = $valor";
            $res_info = mysqli_query($conexion, $peticion);
            $respuesta = mysqli_fetch_assoc($res_info);
            $arregloinfo[]= array("noTrabajador"=>$valor,"nombre"=>$respuesta["nombre"],"aPaterno"=>$respuesta["aPaterno"], "aMaterno"=>$respuesta["aMaterno"], "correo"=>$respuesta["correo"]); 
        }
        echo json_encode($arregloinfo);
        //var_dump($arregloinfo);
    }
?>