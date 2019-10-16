<?
//Подключаемся к БД
$connect = @mysqli_connect("localhost", "root", "", "gallery");

//читаем индекс картинки из URL
$idx = (int)$_GET["idx"];

//Увеличиваем ей в БД количество просмотров на 1
$result = mysqli_query($connect, "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$idx}");

//Читаем данные этой картинки из БД
$result = mysqli_query($connect, "SELECT * FROM `images` WHERE idx={$idx}");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <button class="action" id="likeButton" data-id="<?=$row['idx']?>">Like</button>
        <img src='gallery_img/big/<?=$row['filename']?>'><span id='like'><?=$row['likes']?></span>
        <br>
        <a href="index.php">Назад</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".action").on('click', function(){
            var id = $("#likeButton").attr("data-id");

            $.ajax({
                url: "addlike.php",
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    $('#like').html(answer.result);
                }

            })
        });

    });
</script>
</body>
</html>
