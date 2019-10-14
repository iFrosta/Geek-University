<?php
//1. Создать галерею изображений, состоящую из двух страниц:
//просмотр всех фотографий (уменьшенных копий);
//просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
//2. В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
//3. *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
//4. *На странице просмотра галереи список фотографий должен быть отсортирован по популярности. Популярность = число кликов по фотографии.

$db = @mysqli_connect("localhost","root","","root") or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

// устанавливаем директорию файлов
define("filesPath", 'files/');
$small_path = filesPath . "small/";
$big_path = filesPath . "big/";

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
$small_arr = array_splice(scandir($small_path), 2);

//var_dump($db); // отображаем обьект
//mysqli_close($db); // если скрипт не большой - можно не пользоваться, если большоей, то следует освобождать память

// Отображаем галерею по популярности
$sql = "SELECT * FROM gallery ORDER BY views DESC";

$gallery = "";

$result = @mysqli_query($db, $sql) or die(mysqli_error($db)); // @ - уберает выввод функции

while ($row = mysqli_fetch_assoc($result)) { // Выводим новости из таблицы оформляя их
//  $gallery .= "<b><a href='preview.php?id=" . $row['small'] . "'>" . $row['name'] . "</a>" . "</b>" . "<br>";
  $gallery .= "<a class='photo' href='preview.php?id=". $row['id']  . "'><img src='". $row['small'] . "' width=\"150\" height=\"100\"/></a>";
//  $gallery .= $row['small']. "<br><hr>";
}
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
  <?=$gallery?>
</div>
</body>
</html>
