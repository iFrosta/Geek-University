<?php
$alphabet = [
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

function transliterate($input, $alpha) {
    return strtr(mb_strtolower($input), $alpha);
}

function toUnderline($input) {
    return str_replace(" ", "_", $input);
}

function transToUnder($input, $alpha) {
    return toUnderline(transliterate($input, $alpha));
}

$inputString = "Объединить две ранее написанные функции в одну,
 которая получает строку на русском языке, производит транслитерацию и
 замену пробелов на подчеркивания";
$output = transToUnder($inputString, $alphabet);
return renderTemplate('templateTask', ['solution' => $output]);