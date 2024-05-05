<?php

    function hashearContra ($contra){
        $contraseñaHasheada = hash("SHA256", $contra);
        return $contraseñaHasheada;
    }

    function verificarContra ($contra, $correcta, $sal){
        $coincide = false;
        $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        for($i=0; $i<count($caracteres); $i++){
            for($j=0; $j<count($caracteres); $j++){
                $pimienta = $caracteres[$i].$caracteres[$j];
                $contraseña = $contra.$pimienta.$sal;
                if(hashearContra($contraseña) == $correcta){
                    $coincide = true;
                    break;
                }
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
?>