<?php
//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{
  return renderTamplate(LAYOUTS_DIR . 'layout', [
    'content' => renderTamplate($page, $params),
//    'menu' => renderTemplate('menu', $params),
    'title' => SITE_TITLE
  ]);
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTamplate($page, $params = [])
{
  ob_start();

  if (!is_null($params)) {
    extract($params);
  }

  $fileName = TEMLATES_DIR . $page . '.php';

  if (file_exists($fileName)) {
    include $fileName;
  } else {
    Die("Страницы не существует, 404");
  }

  return ob_get_clean();
}
