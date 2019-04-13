<?
echo "<b>php-1-2-6</b><br><br>";

// 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val
// – заданное число, $pow – степень. Отрицательные можно не делать. При желании сделайте фукнцию анонимной и организуйте
// рекурсию через замыкание.
$val = random_int(0,10);
$pow = random_int(0,10);
echo " Входные данные: <br> a = {$val} <br>  b = {$pow} <br>";

echo "<br> Число: {$val} в степени {$pow} =  ";
echo Recursion($val, $pow);

function Recursion($val, $pow) {
    if ($pow == 0) {
        return 1;
    }
    if ($pow < 0) {
        return Recursion(1/$val, -$pow);
    }
    return $val * Recursion($val, $pow-1);
}

var_dump(Recursion(5, -5));