<?php 
/* 
    Dada una frase, devolver la frase donde las palabras con mayor a 5 letras estén al
    revés. Ejemplo: Dado “Bienvenido a Treda Solutions” retornar “odinevneiB a Treda
    snoitulos
*/

function invertirPalabras($frase){
    $cadenaSeparado = explode(" ", $frase);
    $cadenaInvertida = "";
    foreach ($cadenaSeparado as $key => $value) {
        if(strlen($value) > 5){
            $cadenaInvertida .= strrev($value) . " ";
        }else {
            $cadenaInvertida .= $value . " ";
        }
    }

    return $cadenaInvertida;
}

$frase = "Bienvenido a Treda Solutions";
echo invertirPalabras($frase);
