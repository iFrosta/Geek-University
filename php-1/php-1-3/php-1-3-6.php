<?
echo "<b>php-1-3-6</b><br><br>";

//6. ВАЖНОЕ2.В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо
// представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными
// подменю? Попробовать его реализовать, при желании на движке 3.

function renderTamplate($page) { // engine2/main menu_template/menu_template
    ob_start();
    include $page . '.php';
    return $menu . ob_get_clean();
}

//echo renderTamplate('menu_template/menu_template');
echo renderTamplate('engine2/main') . renderTamplate('menu_template/menu_template');

//$menu = "<ul>";
//for ($i = 1; $i <= 5; $i++) {
//    $menu .= "<li><a href='#'>Меню{$i}</a></li>";
//}
//$menu .= "</ul>";
