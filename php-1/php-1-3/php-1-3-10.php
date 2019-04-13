<?
echo "<b>php-1-3-10</b><br><br>";

//10. *Заполните массив в 100 элементов случайными значениями от 1 до 200, которые не должны повторяться.
//Задача на бесконечный цикл While(true)

// not done yet

$mass = [0,];

for ($i = 0; $i <= 100; $i++) {
    $a = rand(1,200);
    array_push($mass,$a);
}

//foreach ($mass as $key => $number) {
//
//}

var_dump($mass);