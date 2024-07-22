<?php
    require "config.php";
    $conexion=connect(); 
    //obtención valores
    $usuario=(isset($_POST["usuario"])&&$_POST["usuario"]!="")?$_POST["usuario"]:false;
    $contrasena=(isset($_POST["contrasena"])&&$_POST["contrasena"]!="")?$_POST["contrasena"]:false;
    $numTrabajador=(isset($_POST["numTrabajador"])&&$_POST["numTrabajador"]!="")?$_POST["numTrabajador"]:false;

    //sanitización valores
    $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
    $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
    $numTrabajador=filter_var($numTrabajador,FILTER_SANITIZE_NUMBER_INT);
    //regex
    $usuarioR = preg_match('/^AdminP9T\d+$/', $usuario);
    $contrasenaR=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasena);
    $numTrabajadorR=preg_match('/^[0-9]{5,6}$/i', $numTrabajador);
    if($contrasenaR==0||$usuarioR==0||$numTrabajadorR==0)
    {
        $respuesta=[
            "mensaje"=>"El usuario o contraseña no cumplen los requisitos"
        ];
    }
    else
    {
        // $sal=bin2hex(random_bytes(32));
        $sal=uniqid();
        $caracteres=str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $partesPimienta=array_rand($caracteres,4);
        $pimienta=$caracteres[$partesPimienta[0]].$caracteres[$partesPimienta[1]].$caracteres[$partesPimienta[2]].$caracteres[$partesPimienta[3]];
        $contrasenaConSalYPimienta=$contrasena.$pimienta.$sal;
        $hash=hash('sha256',$contrasenaConSalYPimienta);
        // $sql="INSERT INTO administradores VALUES (?,?)";
        // $stmt=mysqli_prepare($conexion,$sql);
        // mysqli_stmt_bind_param()
        $sql="INSERT INTO administradores VALUES (0, '$usuario', '$hash', '$sal', $numTrabajador)";
        $res=mysqli_query($conexion,$sql);
        if(!$res)
        {
            $respuesta=[
                "mensaje" => "No se pudo crear el administrador"
            ];
        }
        else{
            $respuesta=[
                "usuario" => $usuario,
                "contrasena" => $contrasena,
                "mensaje" => "Administrador creado"
            ];
        }
    }
    echo json_encode($respuesta);
?>