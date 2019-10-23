<h1>Cart:</h1>
<? $i = 0;
if (!empty($cart)) { ?>
<div class="Gallery column start">
  <? foreach ($cart as $item): ?>
    <?
    $content = getGalleryContent($item['id_good']);
    $params['nameImg'] = $content['name'];
    $params['price'] = $content['price'];
    ?>
    <? $i++; ?>
    <div class="cart-item">
      <a class='photo' href='/preview/<?= $item['id_good'] ?>'>
        <span><?= $i ?></span>
        <div class="blackout"></div>
        <img src='../<?= fileSmallPath;
        if ($item['id_good'] < 10) {
          echo '0';
        }
        echo $item['id_good'] . '.jpg' ?>' width="150" height="100"/>
      </a>
      <strong><?= $content['name'] ?></strong>
      <label><?= $content['price'] ?>$</label>
      <a class="cart-del" href="/cart/delete/<?= $item['id_good'] ?>">[ x ]</a>
    </div>
  <? endforeach; ?>
  <? } else { ?>
  <div class="Gallery column">
    <h2>Ваша корзина пуста,<br> Вперед за покупками!</h2>
    <? } ?>
  </div>
  <div class="Gallery order column">
    <? if ($_GET['status'] === '1') { ?>
      <h2>Order:</h2>
      <form action="/cart/order/" method="post">
        <input type="text" name="name" placeholder="name" value="<?= $name ?>"><br>
        <input type="tel" name="phone" placeholder="phone" value="<?= $phone ?>"><br>
        <input type="email" name="email" placeholder="address" value="<?= $message ?>"><br>
        <input type="submit" value="Submit">
      </form>
    <? } else { ?>
      <? if ($_GET['status'] === '2') { ?>
        <h2>Your order has been processed!</h2>
      <? } else { ?>
        <a class="buttonAdd" href="/cart/?status=1">Order</a>
      <? } ?>
    <? } ?>
  </div>