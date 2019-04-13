<?
echo "<b>php-1-2-4</b><br><br>";
// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
// значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции
// выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение
// (использовать switch).

$a = random_int(-100,100);
$b = random_int(-100,100);
$x = random_int(1,4);
$operation = array(
    add  => "add",
    mul => "mul",
    div => "div",
    sub => "sub",
    );
$operation = array_rand($operation, 1);
echo " Входные данные: <br> a = {$a} <br>  b = {$b} <br> Operation = {$operation} <br> ";

function mathOperation($a, $b, $operation) {
    include  'functions.php'; //require file functions.php
    switch ($operation){
        case add:
            echo "<br> Сложение: ", add($a,$b); // Сложение
            break;
        case sub:
            echo "<br> Вычитание: ", sub($a,$b); // Вычитание
            break;
        case mul:
            echo "<br> Умножение: ", mul($a,$b); // Умножение
            break;
        case div:
            echo "<br> Деление: ", div($a,$b); // Деление
            break;
    }
}

mathOperation($a,$b,$operation);