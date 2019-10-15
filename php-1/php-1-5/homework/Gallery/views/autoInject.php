<?php
// Данный файл предназначен для автоматической записи файлов в базу данных
$db = @mysqli_connect("localhost","root","","root") or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

// устанавливаем директорию файлов
define("filesPath", 'files/');
$small_path = filesPath . "small/";
$big_path = filesPath . "big/";

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
$small_arr = array_splice(scandir($small_path), 2);

// Автоматический заполняем таблицу беря данные из filesPath
for ($i = 0; $i < count($small_arr); $i++) {
  // присваиваем имя и путь к папкам
  $name = $i+1 . ".jpg";
  $small = $small_path . $small_arr[$i];
  $big = $big_path . $small_arr[$i];

  $sql = "INSERT INTO gallery(id, name, small, big, views, likes) VALUES ('$i+1','$name','$small','$big','0','0')";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}