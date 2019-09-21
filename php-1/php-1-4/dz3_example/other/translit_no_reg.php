<?php
$string = "Тестовая строка, длЯ транслита!";
echo $string . "<br>";

$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

$result = "";
for ($i = 0; $i < mb_strlen($string); $i++) {
    $letter = mb_substr($string, $i, 1);

    if ($alfabet[mb_strtolower($letter)]) {
        if ($letter === mb_strtolower($letter)) {
            $latin_letter = $alfabet[$letter];
        } else {
            $latin_letter = mb_strtoupper($alfabet[mb_strtolower($letter)]);
        }
    } else {
        $latin_letter = $letter;
    }
    $result .= $latin_letter;

}

echo $result;