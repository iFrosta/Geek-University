<? foreach ($images as $image): ?>
    <a href="/image/<?= $image['idx'] ?>">
        <img src="/img/small/<?= $image['filename'] ?>" width="150" height="100">
    </a>
    </a><?= $image['likes'] ?>

<? endforeach; ?>
