<?php
// Контент файла встроен в функцию fillDb in functions

// Данный файл предназначен для автоматической записи файлов в базу данных
$db = @mysqli_connect(HOST,USER,PASS,DB) or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
$small_arr = array_splice(scandir(fileSmallPath), 2);

// Автоматический заполняем таблицу беря данные из filesPath
for ($i = 0; $i < count($small_arr); $i++) {
  // присваиваем имя и путь к папкам
  $sql = "INSERT INTO gallery(id, views) VALUES ('$i+1','0')";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}