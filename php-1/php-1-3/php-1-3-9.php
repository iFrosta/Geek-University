<?
echo "<b>php-1-3-9</b><br><br>";

//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию
//и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

$string = "9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию
и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).";
echo "<b>Before:</b><br> $string <hr>";

function urlGen($string) {
    $dictionary = [
        "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "zh", "з" => "z",
        "и" => "i", "й" => "y", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sch",
        "ь" => "'", "ы" => "y", "ъ" => "''", "э" => "e", "ю" => "yu", "я" => "ya", " " => "-",
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

echo "<b>URL generated:</b> <br>" . urlGen($string);
