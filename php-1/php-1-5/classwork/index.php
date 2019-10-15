<?php

$db = @mysqli_connect("localhost","root","","geek") or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

//var_dump($db); // отображаем обьект
//mysqli_close($db); // если скрипт не большой - можно не пользоваться, если большоей, то следует освобождать память

$sql = "SELECT * FROM `news` WHERE 1";

$result = @mysqli_query($db, $sql) or die(mysqli_error($db)); // @ - убирает выввод функции

$news = "";

//foreach ($result as $value) // показать все ключи для Database geek в переменной db
//    var_dump($value);

//$row = mysqli_fetch_assoc($result); // построчное отображение
//var_dump($row);

while ($row = mysqli_fetch_assoc($result)) { // Выводим новости из таблицы оформляя их

    $news .= "<b><a href='second.php?id=" . $row['id'] . "'>" . $row['prev'] . "</a>" . "</b>" . "<br>";
    $news .= $row['text']. "<br><hr>";
}

echo $news;