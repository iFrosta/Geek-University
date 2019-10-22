<h1>Cart:</h1>
<div class="Gallery">
  <? foreach ($cart as $item): ?>
    <a class='photo' href='/preview/<?= $item['id'] ?>'>
      <span><?= $item['views']; ?></span>
      <div class="blackout"></div>
      <img src='<?= fileSmallPath;
      if ($item['id'] < 10) { // Т.к. название файлов до 10 имеет 0, добавляем 0
        echo '0';
      }
      echo $item['id'] . '.jpg' ?>' width="150" height="100"/>
    </a>
    <?= $price ?>
  <? endforeach; ?>
</div>
<a class="buttonAdd" href="">Order</a>