<?php
// вывод одной новости

$db = @mysqli_connect("localhost", "root", "", "geek") or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

$id = @mysqli_real_escape_string($db, $_GET['id']);

$sql = "SELECT * FROM `news` WHERE id={$id}";

var_dump($sql);

$result = @mysqli_query($db, $sql) or die(mysqli_error($db)); // @ - уберает выввод функции

$news = "";

//foreach ($result as $value) // показать все ключи для Database geek в переменной db
//    var_dump($value);

//$row = mysqli_fetch_assoc($result); // построчное отображение
//var_dump($row);

$row = mysqli_fetch_assoc($result);

$news .= "<b>". $row['prev']. "</b>". "<br>";
$news .= $row['text'] . "<br><hr>";

echo $news;