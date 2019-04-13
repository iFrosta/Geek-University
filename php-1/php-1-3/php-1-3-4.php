<?
echo "<b>php-1-3-4</b><br><br>";

//4. ВАЖНОЕ1. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие
// латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

function transliter($string) {
    $dictionary = [
        "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "zh", "з" => "z",
        "и" => "i", "й" => "y", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sch",
        "ь" => "'", "ы" => "y", "ъ" => "''", "э" => "e", "ю" => "yu", "я" => "ya"
    ];

    $stringToArray = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($stringToArray as $key => $character) {
        foreach ($dictionary as $chr => $after) {
            if ($character == $chr) {
                $stringToArray[$key] = $after;
                break;
            } elseif ($character == mb_strtoupper($chr)) {
                $stringToArray[$key] = mb_strtoupper($after);
                break;
            }
        }
    }
    return implode($stringToArray);
}

$string = "Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие
 латинские буквосочетания";
echo "<b>Before:</b><br> $string <hr>";

transliter($string);

echo "<b>After:</b> <br>" . transliter($string);