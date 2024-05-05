<?php
    // session_start();
    // if(isset($_SESSION["usuario"])){
    //     header('Location: ../../indexAdmin.php');
    // }
    
    // require "./config.php";
    // require "./hashear.php";
    // $conexion = connect ();
    // $usuario=(isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
    // $contrasena=(isset($_POST['contrasena']) && $_POST["contrasena"] != "")? $_POST['contrasena'] : false;
    // $correcta;
    // $sal;
    // //$respuesta[]; //arreglo para el json encode

    // //sanitización y regex usuario
    // $usuario = filter_var($usuario,  FILTER_SANITIZE_STRING);
    // $usuarioR = preg_match('/^[A]{1}[a-z]{4}[P]{1}[9]{1}[A-Z0-9]{3}$/i', $usuario);

    // //sanitización y regex contraseña
    // $contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);
    // //$contrasenaR = preg_match('/^', $contrasena);
    
    // if(!$conexion)
    //     echo "No se pudo conectar con la base de datos";
    // else
    // {
    //     $existeUser = "SELECT * FROM Administradores WHERE Usuario = '$usuario'";
    //     $buscando = mysqli_query($conexion, $existeUser);
    //     if(mysqli_num_rows($buscando) == 0)        //verifica si existe un registro con ese usuario
    //         echo "Ese usuario no existe";
    //     else 
    //     {
    //         $sql= "SELECT Contraseña, Sal FROM Administradores WHERE Usuario = '$usuario'";
    //         $res =  mysqli_query($conexion, $sql);
    //         while($retorno = mysqli_fetch_assoc($res))
    //         {
    //             $correcta = $retorno['Contraseña'];
    //             $sal = $retorno['Sal'];
    //         }
    //         var_dump($correcta);
    //         var_dump($sal);
    //         $verificacion = verificarContra($contrasena, $correcta, $sal);
    //         var_dump($verificacion);
    //         if($verificacion){        //verifica que la contraseña sea la misma
                
    //             $_SESSION["usuario"] = $usuario;
    //             header('Location: ../../indexAdmin.php');
    //             echo "Done";
    //         }
        
    //     }
    // }

    // echo $usuario;
    // echo "$contrasena";




session_start();

// Funnciones de hasheo y verificar
function hashearContra($contra, $pimienta, $sal) {
    $contraseñaHasheada = hash("SHA256", $contra . $pimienta. $sal);
    return $contraseñaHasheada;
}

function verificarContra ($contra, $correcta, $sal){
    $coincide = false;
    $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
    for($i=0; $i<count($caracteres); $i++){
        for($j=0; $j<count($caracteres); $j++){
            $pimienta = $caracteres[$i].$caracteres[$j];
            $contraseña = $contra.$pimienta.$sal;
            $new=hashearContra($contraseña, $pimienta, $sal);
            if($new == $correcta){
                $coincide = true;
                break;
            }

        // echo $contra;
        // echo "<br>";
        // echo $correcta;
        // echo "<br>";
        // echo $contraseña;
        // echo "<br>";
        // echo $sal;
        // echo "<br>";
        // echo $new=hashearContra($contraseña, $pimienta, $sal);
        // echo "<brQQQ>";
        // echo "<br>";
        // echo "<br>";
        }
    }
    return $coincide;
}

function generarSal(){
    $sal = uniqid();
    return $sal;
}

function generarPimienta(){
    $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
    $partesPimienta = array_rand($caracteres, 2);
    $p1 = $caracteres[$partesPimienta[0]];
    $p2 = $caracteres[$partesPimienta[1]];
    $pimienta = $p1.$p2;
    return $pimienta;
    
}

$contraseña = '$p9tuAdm2024!';
$sal1= generarSal();
$pimienta1= generarPimienta();
$nueva = hashearContra($contraseña, $pimienta1, $sal1);
$verificacion = verificarContra($contraseña, $nueva, $sal1);


echo $contraseña;
echo "<br>";
echo $nueva;
echo "<br>";
echo $sal1;
echo "<br>";
var_dump($verificacion);
echo "<br>";
echo "<br>";

//echo $sal1;

//$hasheada = 'c0acea38170bbd04d353adcb021e639d2fdc9a08c9396731f9d6df4dba97ac0e';
//$sal = '6492554b654ae';

//verificar contraseña

$verificacion = verificarContra($contraseña, $nueva, $sal1);
echo "<br>";
var_dump($verificacion);

//     if ($verificacion) 
//         echo "Sí";
//     else 
//         echo "No";
    

?>

