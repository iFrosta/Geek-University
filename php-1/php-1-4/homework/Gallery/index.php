<?php
// 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все
// картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться
// в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения
// необходимо делать проверку на тип и размер файла.

// устанавливаем директорию файлов
define("filesPath", 'files/');
$small_path = filesPath . "small/";
$big_path = filesPath . "big/";

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
$small_arr = array_splice(scandir($small_path), 2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My Gallery</title>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<h1>- Gallery -</h1>
<div class="Gallery">
  <?
  for ($i = 0; $i < count($small_arr); $i++) {
    echo "<a class='photo' href='". $big_path . $small_arr[$i] . "'><img src='". $small_path . $small_arr[$i]."' width=\"150\" height=\"100\"/></a>";
  }
  ?>
</div>
</body>
</html>
