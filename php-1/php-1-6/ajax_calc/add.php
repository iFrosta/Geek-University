<?php

    $operand1 = (int)$_POST['operand1'];
    $operand2 = (int)$_POST['operand2'];

	
	$summ=$operand1+$operand2;
	
	$str="{$operand1} + {$operand2} ={$summ}";
	
	$file=fopen("data.txt", 'w');
	fputs($file, $str);
	fclose($file);
	
	
	$response['result'] = $operand1+$operand2;
	echo json_encode($response);