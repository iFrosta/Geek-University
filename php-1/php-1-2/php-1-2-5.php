<?
echo "<b>php-1-2-5</b><br><br>";

//    5. ВАЖНОЕ! Написать функцию renderTemplate возвращающую шаблон в виде текста, вынесите весь повторяющийся код
// из шаблона страниц (doctype, menu, header, footer) в отдельный шаблон (layout), сделайте отдельный шаблон страницы
// с приветствием. Обеспечьте формирование результирующей страницы используя только функцию renderTemplate, т.е. в
// layout должен вставиться подшаблончик страницы с приветствием.

// Взаимодействие с файлами layout.php, welcome.php
function renderTamplate($page) {
    ob_start();
    include $page . '.php';
    return ob_get_clean();
}

echo renderTamplate('layout');  //rendering происходит используя шаблоны на разных страницах
echo renderTamplate('welcome');
// используя данный примере phpStorm Ругается: echo renderTamplate('layout', renderTamplate('welcome'));