<?php
//     // session_start();
//     // if(isset($_SESSION["usuario"])){
//     //     header('Location: ../../indexAdmin.php');
//     // }
    
//     // require "./config.php";
//     // require "./hashear.php";
//     // $conexion = connect ();
//     // $usuario=(isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
//     // $contrasena=(isset($_POST['contrasena']) && $_POST["contrasena"] != "")? $_POST['contrasena'] : false;
//     // $correcta;
//     // $sal;
//     // //$respuesta[]; //arreglo para el json encode

//     // //sanitización y regex usuario
//     // $usuario = filter_var($usuario,  FILTER_SANITIZE_STRING);
//     // $usuarioR = preg_match('/^[A]{1}[a-z]{4}[P]{1}[9]{1}[A-Z0-9]{3}$/i', $usuario);

//     // //sanitización y regex contraseña
//     // $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);
//     // //$contrasenaR =     
    
//     // if(!$conexion)
//     //     echo "No se pudo conectar con la base de datos";
//     // else
//     // {
//     //     $existeUser = "SELECT * FROM Administradores WHERE Usuario = '$usuario'";
//     //     $buscando = mysqli_query($conexion, $existeUser);
//     //     if(mysqli_num_rows($buscando) == 0)        //verifica si existe un registro con ese usuario
//     //         echo "Ese usuario no existe";
//     //     else 
//     //     {
//     //         $sql= "SELECT Contraseña, Sal FROM Administradores WHERE Usuario = '$usuario'";
//     //         $res =  mysqli_query($conexion, $sql);
//     //         while($retorno = mysqli_fetch_assoc($res))
//     //         {
//     //             $correcta = $retorno['Contraseña'];
//     //             $sal = $retorno['Sal'];
//     //         }
//     //         var_dump($correcta);
//     //         var_dump($sal);
//     //         $verificacion = verificarContra($contrasena, $correcta, $sal);
//     //         var_dump($verificacion);
//     //         if($verificacion){        //verifica que la contraseña sea la misma
                
//     //             $_SESSION["usuario"] = $usuario;
//     //             header('Location: ../../indexAdmin.php');
//     //             echo "Done";
//     //         }
        
//     //     }
//     // }

//     // echo $usuario;
//     // echo "$contrasena";




// // session_start();

// // // Funnciones de hasheo y verificar
// // function hashearContra($contra, $pimienta, $sal) {
// //     $contraseñaHasheada = hash("SHA256", $contra . $pimienta. $sal);
// //     return $contraseñaHasheada;
// // }

// // function verificarContra ($contra, $correcta, $sal){
// //     $coincide = false;
// //     $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
// //     for($i=0; $i<count($caracteres); $i++){
// //         for($j=0; $j<count($caracteres); $j++){
// //             $pimienta = $caracteres[$i].$caracteres[$j];
// //             $contraseña = $contra.$pimienta.$sal;
// //             $new=hashearContra($contraseña, $pimienta, $sal);
// //             if($new == $correcta){
// //                 $coincide = true;
// //                 break;
// //             }

// //         // echo $contra;
// //         // echo "<br>";
// //         // echo $correcta;
// //         // echo "<br>";
// //         // echo $contraseña;
// //         // echo "<br>";
// //         // echo $sal;
// //         // echo "<br>";
// //         // echo $new=hashearContra($contraseña, $pimienta, $sal);
// //         // echo "<brQQQ>";
// //         // echo "<br>";
// //         // echo "<br>";
// //         }
// //     }
// //     return $coincide;
// // }

// // function generarSal(){
// //     $sal = uniqid();
// //     return $sal;
// // }

// // function generarPimienta(){
// //     $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
// //     $partesPimienta = array_rand($caracteres, 2);
// //     $p1 = $caracteres[$partesPimienta[0]];
// //     $p2 = $caracteres[$partesPimienta[1]];
// //     $pimienta = $p1.$p2;
// //     return $pimienta;
    
// // }

// // $contraseña = '$p9tuAdm2024!';
// // $sal1= generarSal();
// // $pimienta1= generarPimienta();
// // $nueva = hashearContra($contraseña, $pimienta1, $sal1);
// // $verificacion = verificarContra($contraseña, $nueva, $sal1);


// // echo $contraseña;
// // echo "<br>";
// // echo $nueva;
// // echo "<br>";
// // echo $sal1;
// // echo "<br>";
// // var_dump($verificacion);
// // echo "<br>";
// // echo "<br>";

// // //echo $sal1;

// // //$hasheada = 'c0acea38170bbd04d353adcb021e639d2fdc9a08c9396731f9d6df4dba97ac0e';
// // //$sal = '6492554b654ae';

// // //verificar contraseña

// // $verificacion = verificarContra($contraseña, $nueva, $sal1);
// // echo "<br>";
// // var_dump($verificacion);

// // //     if ($verificacion) 
// // //         echo "Sí";
// // //     else 
// // //         echo "No";
    


// function verificarContrasena($contrasena,$sal,$hashGuardado)
// {
//     $caracteres=str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
//     for($i=0;$i<count($caracteres);$i++)
//     {
//         for($j=0;$j<count($caracteres);$j++)
//         {
//             for($k=0;$k<count($caracteres);$k++)
//             {
//                 for($l=0;$l<count($caracteres);$l++)
//                 {
//                     $pimienta=$caracteres[$l].$caracteres[$k].$caracteres[$j].$caracteres[$i];
//                     if(hash('sha256',$contrasena.$pimienta.$sal)===$hashGuardado)
//                     {
//                         return true;
//                     }
//                 }
//             }
//         }
//     }
//     return false;
// }

// require "config.php";
// $conexion=connect();
// //obtención valores
// $usuario=(isset($_POST["usuario"])&&$_POST["usuario"]!="")?$_POST["usuario"]:false;
// $contrasena=(isset($_POST["contrasena"])&&$_POST["contrasena"]!="")?$_POST["contrasena"]:false;

// //sanitización valores
// $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
// $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
// //regex
// // echo $usuario;
// $usuarioR = preg_match('/^AdminP9T[1-100]+$/i', $usuario);

// $contrasenaR = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasena);
// //$contrasenaR=1;

// //echo $usuario;
// // echo $contrasena;

// // echo "<br>";
// // var_dump ($usuarioR);
// // var_dump ($contrasenaR);
// if($contrasenaR==0||$usuarioR==0)
// {
//     $respuesta = array("ok"=>false, "mensaje" => "El usuario o contraseña no cumplen los requisitos");
//     // echo "no";
// }
// else
// {
//     // echo "sí";
//     // obtener sal y hash guardados en la bd
//     $sql = "SELECT contraseña, sal FROM administradores WHERE usuario=?";
//     $stmt = mysqli_prepare($conexion, $sql);
//     mysqli_stmt_bind_param($stmt, "s", $usuario); // "i" indica que es un parámetro de tipo entero
//     mysqli_stmt_execute($stmt);
//     $res = mysqli_stmt_get_result($stmt);
//     $resp = mysqli_fetch_assoc($res);
//     $sal=$resp['sal'];
//     $hashGuardado=$resp['contraseña'];
//     // echo $hashGuardado;

//     if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==true)
//     {
//         $respuesta=[
//             "mensaje" => "Error con la contraseña"
//         ];
//         // echo "Sí";
//     }
//     // echo "<br>";
//     // echo "<br>";
//     // $comparacion=verificarContrasena($contrasena, $sal, $hashGuardado);
//     // var_dump($comparacion);

// }
// // echo json_encode($respuesta);

    function verificarContrasena($contrasena,$sal,$hashGuardado)
    {
        $caracteres=str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        for($i=0;$i<count($caracteres);$i++)
        {
            for($j=0;$j<count($caracteres);$j++)
            {
                for($k=0;$k<count($caracteres);$k++)
                {
                    for($l=0;$l<count($caracteres);$l++)
                    {
                        $pimienta=$caracteres[$l].$caracteres[$k].$caracteres[$j].$caracteres[$i];
                        if(hash('sha256',$contrasena.$pimienta.$sal)===$hashGuardado)
                        {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

    require "config.php";
    $conexion = connect();

    //obtención valores
    $usuario=(isset($_POST["usuario"])&&$_POST["usuario"]!="")?$_POST["usuario"]:false;
    $contrasena=(isset($_POST["contrasena"])&&$_POST["contrasena"]!="")?$_POST["contrasena"]:false;

    //sanitización valores
    $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
    $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
    //regex
    // $usuarioR=preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,12}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,12})?$/i', $usuario);
    $usuarioR = preg_match('/^AdminP9T[1-100]+$/i', $usuario);
    // $contrasenaR=preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,250}( [a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]{1,250})?$/i', $contrasena);
    $contrasenaR=preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[^\s]{10,20}$/', $contrasena);

    if($contrasenaR==0||$usuarioR==0)
    {
        $respuesta=[
            "mensaje"=>"El usuario o contraseña no cumplen los requisitos"
        ];
    }
    else
    {
        // obtener sal y hash guardados en la bd
        $sql = "SELECT contraseña, sal FROM administradores WHERE usuario=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "s", $usuario); // "i" indica que es un parámetro de tipo entero
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $resp = mysqli_fetch_assoc($res);
        $sal=$resp['sal'];
        $hashGuardado=$resp['contraseña'];

        if(($comparacion=verificarContrasena($contrasena, $sal, $hashGuardado))==false)
        {
            $respuesta=[
                "mensaje" => "Error con la contraseña"
            ];
        }
        else{
            $sql = "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$hashGuardado'";
            $res = mysqli_query($conexion, $sql);
            if(!$res)
            {
                $respuesta =[
                    "mensaje" => "Usuario o contraseña equivocado"
                ];
            } 
            else
            {
                $respuesta=[
                    "usuario" => $usuario,
                    "contrasena" => $contrasena,
                    "mensaje" => "correcto"
                ];
            }
        }
    }
    echo json_encode($respuesta);
?>


