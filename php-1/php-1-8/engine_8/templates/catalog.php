<? foreach ($images as $image): ?>
    <?=$image['name']?> <br>
    <a href="/image/<?= $image['idx'] ?>">
        <img src="/img/small/<?= $image['filename'] ?>" width="150" height="100">
    </a><br>
    <a href="/basket/buy/<?=$image['idx']?>">Купить</a>  <br>
    Цена: <?=$image['price']?>  <br>
    Просмотров: <?= $image['likes'] ?><br><br><br>

<? endforeach; ?>
