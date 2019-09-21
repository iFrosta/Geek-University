<?php
$i = 0;
$numbers = '';
while ($i <= 100) {
    if (!($i % 3)) {
        $numbers .= $i . ', ';
    }
    $i++;
}
$numbers = substr_replace(trim($numbers), '', -1, 1);
return renderTemplate('templateTask', ['solution' => $numbers]);