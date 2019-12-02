<button class="action" id="likeButton" data-id="<?=$id?>">Like</button><br>

<img src="/img/big/<?= $image?>" width="300"><br>
Просмотров: <span id='like'><?= $likes?></span>
<br>
<h2>Отзывы</h2>

<form action="/image/<?=$formAction?>/?backid=<?=$id?>" method="post">
    <?=$status?> <br>
    <input hidden type="text" name="id" value="<?=$edit_id?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Текст отзыва" value="<?=$message?>"><br>
    <input type="submit" name="send" value="<?=$textAction?>">
</form>


<? foreach ($feedback as $item): ?>
    <p><b><?= $item['name'] ?></b>: <?= $item['feedback'] ?>
        <a href="/image/edit/<?=$item['id']?>/?backid=<?=$id?>">[edit]</a>
        <a href="/image/delete/<?=$item['id']?>/?backid=<?=$id?>">[X]</a>
    </p>

<? endforeach; ?>


<script>
    $(document).ready(function(){
        $(".action").on('click', function(){
            var id = $("#likeButton").attr("data-id");

            $.ajax({
                url: "/addlike/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id,
                },
                error: function() {alert("Что-то пошло не так...");},
                success: function(answer){
                    $('#like').html(answer.likes);
                }

            })
        });

    });
</script>