<?php
$id = (int)$_POST['id'];

$connect = @mysqli_connect("localhost", "root", "", "gallery");


//Увеличиваем ей в БД количество просмотров на 1
$result = mysqli_query($connect, "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$id}");

//вернем новое число просмотров
$result = mysqli_query($connect, "SELECT * FROM `images` WHERE idx={$id}");
$row = mysqli_fetch_assoc($result);
$likes = $row['likes'];

$response['result'] = $likes;


echo json_encode($response);