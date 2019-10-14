<?php
// Выводим одну картинку из базы данных полученную методом Get из index.php

// Подключаем базу данных+
$db = @mysqli_connect("localhost","root","","root") or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

// Переносим значение из GET в переменную
$id = @mysqli_real_escape_string($db, $_GET['id']);

// Запрашиваем картинку под id
$sql = "SELECT * FROM gallery WHERE id={$id}";
$result = @mysqli_query($db, $sql) or die(mysqli_error($db)); // @ - уберает выввод функции
// Создаем пустой масив gallery
$gallery = "";
// Создаем аасоциативный массив
$row = mysqli_fetch_assoc($result);

// Выводим картинку и ее статы
$gallery .= "<a class='photo' href='preview.php?id=". $row['id']  . "'><img src='". $row['big'] . "'/></a>";
$gallery .= "<div class='stats'>";
$gallery .= "<div class='views'>". $row['views']. " views </div>";
//$gallery .= "<div class='likes'>". $row['likes']. " likes </div>";
$gallery .= "<div class=\"heart\"></div>";
$gallery .= "</div>";

// Обновляем views count = views + current view
$sql = "UPDATE gallery SET `views`= `views` + 1 WHERE `id` = '".intval($id)."'";
$result = @mysqli_query($db, $sql) or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Image</title>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<a style="color:black;" href="index.php">< - Back</a>
<h1>- Image -</h1>
<div class="Gallery single">
  <?=$gallery?>
</div>
</body>
</html>
