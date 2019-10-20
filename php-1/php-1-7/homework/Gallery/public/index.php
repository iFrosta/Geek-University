<?php
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include "../config/main.php";

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$page = "";
$action = "";
$id = "";
//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if ($url_array[1] == "") {
  $page = 'index';
} else {
  $page = $url_array[1];
  if (!$url_array[2] == "") {
    if (is_numeric($url_array[2])) {
      $id = $url_array[2];
    } else {
      $action = $url_array[2];
      if (is_numeric($url_array[3])) {
        $id = $url_array[3];
      } else {
        $action = $url_array[3];
        if (is_numeric($url_array[4])) {
          $id = $url_array[4];
        }
      }
    }
  }
}
//var_dump($page, $action, $id);
$params = prepareVariables($page, $action, $id);

//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);



