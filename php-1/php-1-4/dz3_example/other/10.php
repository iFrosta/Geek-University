<?php
$A=[];
while(true) {
    $n = mt_rand(1,200);
    if (!in_array($n, $A)) {
        $A[] = $n;
        if (count($A) == 100) break;
    }
}

var_dump($A);


//или

$A = range(1,200);
shuffle($A);
$A = array_splice($A, 0, 100);
var_dump($A);