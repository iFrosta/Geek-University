<?php
$regions = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань', 'Касимов', 'Сапожок', 'Кадом', 'Шилово'
    ]
];
$output = '';
foreach ($regions as $state => $towns) {
    $output .= "<h3>{$state}:</h3>";
    $output .= "<p>";
    foreach ($towns as $town) {
        $output .= "{$town}, ";
    }
    $output = substr_replace(trim($output), '', -1, 1);
    $output .= "</p>";
}
return renderTemplate('templateTask', ['solution' => $output]);