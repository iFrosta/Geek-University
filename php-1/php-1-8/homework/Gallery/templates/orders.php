<? // var_dump($cart) ?>
<h1>Оформленные заказы:</h1>
<? $i = 0;
if (!empty($cart)) { ?>
<div class="Gallery column start">
  <? foreach ($cart as $item): ?>
    <? $product_price = 0;
    $content = getGalleryContent($item['id_good']);
    $params['nameImg'] = $content['name'];
    $params['price'] = $content['price'];
    ?>
    <? $i++; ?>
    <div class="cart-item order-item">
      <div class="order-info">
        <?= $item['id'] ?>
        <div class="order-name">
          Name:<strong><?= $item['name'] ?></strong>
        </div>
        <div class="order-name">
          Phone: <strong> <?= $item['phone'] ?></strong>
        </div>
        <div class="order-name">
          Address: <strong> <?= $item['address'] ?></strong>
        </div>
        <div class="order-name">
          Login: <strong><?= $item['login'] ?></strong>
        </div>
        <a href="/order/delete/<?= $item['id'] ?>">[ x ]</a>
      </div>
      <div class="order-products">
        <? $order_items = getOneOrder($item['session']);
        foreach ($order_items as $order_item):
          $product = getGalleryContent($order_item['id_good']);
          $product_price += $product['price'];
          ?>
          <a class='photo' href='/preview/<?= $order_item['id_good'] ?>'>
            <span><?= $product['price']; ?></span>
            <img src='../<?= fileSmallPath;
            if ($order_item['id_good'] < 10) {
              echo '0';
            }
            echo $order_item['id_good'] . '.jpg' ?>'/></a>
        <? endforeach; ?>
      </div>
      <?= '<div class="product-price">', 'Summary: <strong> ', $product_price, '</strong></div>'; ?>
    </div>
  <?
  endforeach; ?>
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
      <? } ?>
    <? } ?>
  </div>