<?
echo "<b>php-1-2-2</b><br><br>";
//    2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел
//     от $a до 15. *. сделайте это через цикл if

$a = random_int(0,15);
$b = "&nbsp;";
echo " Входные данные: <br> a = {$a} <br>";

echo "<br> Решение: <br>";

switch ($a) {
    case 0:
        echo "0" . $b; // echo $a++ . $b;
    case 1:
        echo "1" . $b; // echo $a++ . $b;
    case 2:
        echo "2" . $b; // echo $a++ . $b;..
    case 3:
        echo "3" . $b; // ..
    case 4:
        echo "4" . $b;
    case 5:
        echo "5" . $b;
    case 6:
        echo "6" . $b;
    case 7:
        echo "7" . $b;
    case 8:
        echo "8" . $b;
    case 9:
        echo "9" . $b;
    case 10:
        echo "10" . $b;
    case 11:
        echo "11" . $b;
    case 12:
        echo "12" . $b;
    case 13:
        echo "13" . $b;
    case 14:
        echo "14" . $b;
    case 15:
        echo "15" . $b;
}

echo "<br><br> Вариант 2 <br>";
for ($i = $a; $i <= 15; $i++) {
    echo " {$i} ";
}
