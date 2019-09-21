<?php
$i = 0;
$output = '';
do {
    if ($i == 0) {
        $output .= $i . " - это ноль";
    } else if ($i % 2) {
        $output .= $i . " - нечетное число";
    } else {
        $output .= $i . " - четное число";
    }
    $output .= "<br>";
    $i++;
} while ($i <= 10);
return renderTemplate('templateTask', ['solution' => $output]);