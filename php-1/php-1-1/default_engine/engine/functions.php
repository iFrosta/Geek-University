<?php
// Render layout

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
//    extract($params);
    return renderTemplate(LAYOUTS_DIR . 'layout', [
        "content"=>renderTemplate($page, $params)
    ]);
}

// Render page init
function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }

    $fileName = TEMPLATES_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
//        include $file = TEMPLATES_DIR . '404.php';
    }
    return ob_get_clean();
}