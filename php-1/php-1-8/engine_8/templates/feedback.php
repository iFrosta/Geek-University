<h2>Отзывы</h2>

<form action="/feedback/<?=$formAction?>/" method="post">
    <?=$status?> <br>
    <input hidden type="text" name="id" value="<?=$id?>"><br>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$name?>"><br>
    <input type="text" name="message" placeholder="Текст отзыва" value="<?=$message?>"><br>
    <input type="submit" name="send" value="<?=$textAction?>">
</form>


<? foreach ($feedback as $item): ?>
    <p><b><?= $item['name'] ?></b>: <?= $item['feedback'] ?>
        <a href="/feedback/edit/<?=$item['id']?>">[edit]</a>
        <a href="/feedback/delete/<?=$item['id']?>">[X]</a>
    </p>

<? endforeach; ?>
