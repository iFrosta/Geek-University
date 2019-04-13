<?
echo "<b>php-1-2-7</b><br><br>";

// 7. Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

function hourToString($hour) // часы
{
    if ($hour == 1 || $hour == 21) {
        $hourText = "час";
    } elseif (($hour >= 2 && $hour <= 4) || ($hour >= 22 && $hour <= 24)) {
        $hourText = "часа";
    } else {
        $hourText = "часов";
    }
    return $hourText;
}

function minuteToString($minute) // Минуты
{

    if (strlen($minute) < 2) {
        $minute = "0" . $minute;
    }
    $m = substr($minute, 1, 1);
    if ($m == 1 && $minute != 11) {
        $minuteText = "минута";
    } elseif (($minute > 1 && $minute < 5)
        || (($m > 1 && $m < 5) && (($minute % 100) > 20))
    ) {
        $minuteText = "минуты";
    } else {
        $minuteText = "минут";
    }
    return $minuteText;
}

function timeToString($hour, $minute) // Часы + Минуты
{
    if ((!is_numeric($hour) || !is_numeric($minute))
        || ($hour < 0 || $hour > 24) || ($minute < 0 || $minute > 60)
    ) {
        $result = "Неверные исходные данные";
    } else {
        $result = "$hour " . hourToString($hour) . " $minute " . minuteToString($minute);
    }
    return $result;
}

for ($i = 0; $i < 10; $i++) { // Тест
    $h = rand(0, 23);
    $m = rand(0, 59);
    $randH = time() + (7 * $h * 60 * 60);
    $randM = time() + (7 * 24 * $m * 60);
    $hour = date("H", $randH);
    $minute = date("i", $randM);
    echo "Исходные данные: $hour:$minute<br>";
    echo "Преобразованные:  " . timeToString($hour, $minute) . "<hr>";
}