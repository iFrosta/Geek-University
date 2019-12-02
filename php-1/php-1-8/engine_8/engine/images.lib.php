<?php

//функция возвращает имя файла по его idx
function getOneImage($id)
{
    $sql = "SELECT * FROM `images` WHERE idx={$id}";
    $row = getAssocResult($sql);
    return $row[0];
}

//увеличим число лайков на 1 одним запросом к базе
function add_likes($id)
{
    $sql = "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$id}";
    executeQuery($sql);
}

function getImages()
{
    $sql = "SELECT * FROM `images` ORDER BY likes DESC";
    $images = getAssocResult($sql);
    return $images;
}