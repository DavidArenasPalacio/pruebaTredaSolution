<?php
/* 
    Dado un número n encontrar todos los múltiplos de 3 y 5 menores al número dado, el
    método debe retornar la suma de los múltiplos encontrados. Ejemplo: si el número
    ingresado es 10, los múltiplos de 3 y 5 menores a 10 son: 3, 5, 6, 9, el resultado de la
    función debe ser 23, debido a que es la suma de 3, 5, 6, 9
*/
function metodoX($n)
{

    $sumaMultiplos = 0;

    for ($i = 1; $i < $n; $i++) {
        if ($i % 3 === 0 || $i % 5 === 0) {
            $sumaMultiplos += $i;
        }
    }

    return $sumaMultiplos;
}

echo metodoX(10);
