<h1>Cart:</h1>
<div class="Gallery column start">
  <? $i = 0;
  if (!empty($cart)) {
    foreach ($cart as $item): ?>
      <?
      $content = getGalleryContent($item['id']);
      $params['nameImg'] = $content['name'];
      $params['id'] = $content['id'];
      $params['views'] = $content['views'];
      $params['description'] = $content['description'];
      $params['price'] = $content['price'];
      ?>
      <? $i++; ?>
      <div class="cart-item">
        <a class='photo' href='/preview/<?= $item['id'] ?>'>
          <span><?= $i ?></span>
          <div class="blackout"></div>
          <img src='../<?= fileSmallPath;
          if ($item['id'] < 10) {
            echo '0';
          }
          echo $item['id'] . '.jpg' ?>' width="150" height="100"/>
        </a>
        <strong><?=$content['name']?></strong>
        <label><?=$content['price']?>$</label>
      </div>
    <? endforeach; ?>
    <a class="buttonAdd" href="">Order</a>
  <? } else { ?>
      <h2>Ваша корзина пуста,<br> Вперед за покупками!</h2>
  <? } ?>
</div>