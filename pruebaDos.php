<?php 
/* 
    Dada una frase, devolver la frase donde las palabras con mayor a 5 letras estén al
    revés. Ejemplo: Dado “Bienvenido a Treda Solutions” retornar “odinevneiB a Treda
    snoitulos
*/

$frase = "Bienvenido a Treda Solutions";
$cadenaSeparado = explode(" ", $frase);

$cadenaInvertida = "";
foreach ($cadenaSeparado as $key => $value) {
    if(strlen($value) > 5){
        $cadenaInvertida .= strrev($value) . " ";
    }else {
        $cadenaInvertida .= $value . " ";
    }
}

echo $cadenaInvertida;
