<?
echo "<b>php-1-3-5</b><br><br>";

//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function replace($string) {
    $dictionary = [" " => "-",];

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

$string = "Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.";
echo "<b>Before:</b><br> $string <hr>";

replace($string);

echo "<b>After:</b> <br>" . replace($string);