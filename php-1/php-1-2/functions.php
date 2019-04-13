<?
// functions for php-1-2-4.php

function add($a, $b) { // Сложение
    return $a + $b;
}

function sub($a, $b) { // Вычитание
    return $a - $b;
}

function mul($a, $b) { // Умножение
    return $a * $b;
}

function div($a, $b) { // Деление
    return ($b == 0 ) ? "На 0 делить можно :)" : $a / $b;
}