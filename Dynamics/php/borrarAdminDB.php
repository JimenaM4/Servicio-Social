<?php 
    require "./config.php";
    $conexion= connect();
    if (!$conexion){ 
        echo "no se conecto con la base";
    }
    else{
        $idAdmin = "SELECT idAdmin FROM administradores"; 
        $res_id = mysqli_query($conexion, $idAdmin);
        $arregloid=[];
        while($row=mysqli_fetch_assoc($res_id)) //mete todos los id´s recibidos en un arreglo
        {
            $arregloid[] = $row["idAdmin"]; //todos los id
        }
        
        //var_dump($arregloid);
        
        $arregloinfo=[];
        foreach($arregloid as $localidad=>$valor)//recorre el arreglo de id´s y a su vez va metiendo en otro arreglo la información que llega de la petición creando así un arreglo donde cada localidad representa un registro 
        {
            $peticion = "SELECT usuario, noTrabajador FROM administradores WHERE idAdmin = $valor ";
            $res_info = mysqli_query($conexion, $peticion);
            $respuesta = mysqli_fetch_assoc($res_info);
            $arregloinfo[]= array("id"=>$valor,"Usuario"=>$respuesta["usuario"], "NoTrabajador"=>$respuesta["noTrabajador"]); 
        }
        echo json_encode($arregloinfo);
    }
    ?>
