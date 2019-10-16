<?
//Подключаемся к БД
$connect = @mysqli_connect("localhost", "root", "", "gallery");

//Читаем данные этой картинки из БД
$result = mysqli_query($connect, "SELECT * FROM images");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?
        //Выводим все картинки в цикле формируя ссылку на вторую страницу по idx
        while ($row = mysqli_fetch_assoc($result))
            echo "<a href='show_image.php?idx={$row['idx']}'><img src='gallery_img/small/{$row['filename']}' /></a>{$row['likes']}";
        ?>

    </div>
</div>

</body>
</html>
