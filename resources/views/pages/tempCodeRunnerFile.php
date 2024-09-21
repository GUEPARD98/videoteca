<?php

$count =  readline("ingrese cantidad de donaciones");

if ($count >= 100) {
    echo 'Tu retiro esta en proceso';
} else {
    echo 'No puede';
}
echo "\n";