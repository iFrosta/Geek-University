<?php

$op1 = (int)$_POST['op1'];
$op2 = (int)$_POST['op2'];
$func = $_POST['func'];

switch ($func) {
  case 'sum':
    $result=$op1+$op2;
    $show = ' + ';
    break;
  case 'min':
    $result=$op1-$op2;
    $show = ' - ';
    break;
  case 'mul':
    $result=$op1*$op2;
    $show = ' * ';
    break;
  case 'div':
    if ($op2 != 0) {
      $result=$op1/$op2;
      $show = ' / ';
    } else {
      $result = ' делить нельзя';
      $show = ' на ';
    }
    break;
}

$str="{$op1} {$show} {$op2} = {$result} --- {$func}";

$file=fopen("data.txt", 'w');
fputs($file, $str);
fclose($file);

$response['result'] = $result;
echo json_encode($response);