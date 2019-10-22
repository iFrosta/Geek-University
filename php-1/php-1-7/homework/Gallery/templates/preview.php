<a class="button" style="color:black;" href="/index">Back</a>
<h1>- Image -</h1>
<div class="Gallery single">
  <div class='views'><?= $nameImg ?></div>
  <a class='photo' href='/preview/<?= $id ?>'>
    <img src='../<?= fileBigPath;
    if ($id < 10) { // Т.к. название файлов до 10 имеет 0, добавляем 0
      echo '0';
    }
    echo $id . '.jpg' ?>'/></a>
  <div class='views'><?= $views ?> views</div>
  <div class='description'><span>Description</span>:<br><?=$description?></div>
  <div class='price'><?=$price?>$
    <a href="/preview/addCart/<?= $id ?>" class="buttonAdd">Add to cart</a>
  </div>
  <div class='feedback'>
    <span>--- Feedback ---</span>
    <? if (empty($params['feedback'])): ?>
      <span><? echo $nofeedback; ?></span>
    <? else: ?>
      <? foreach ($feedback as $item): ?>
        <p>
          <b><?= $item['name'] ?> - </b> <?= $item['feedback'] ?>
          <a href="/preview/edit/<?= $item['id']?>/?backid=<?=$id?>">[edit]</a>
          <a href="/preview/delete/<?= $item['id'] ?>">[x]</a><br>
        </p>
      <? endforeach; ?>
    <? endif; ?>
    <? if ($params['update'] != 'yes'): ?>
      <form action="/preview/add/<?= $id ?>" method="post">
        Оставьте отзыв: <br>
        <input type="text" name="name" placeholder="Ваше Имя" value="<?= $name ?>"><br>
        <input type="text" name="message" placeholder="Ваш отзыв" value="<?= $message ?>"><br>
        <input type="submit">
      </form>
    <? else: ?>
      <form action="/preview/edit/<?= "{$params['id']}/{$params['update']['id']}" ?>" method="post">
        Оставьте отзыв: <br>
        <input type="text" name="name" placeholder="Ваше Имя" value="<?= $params['update']['name'] ?>"><br>
        <input type="text" name="message" placeholder="Ваш отзыв" value="<?= $$params['update']['feedback'] ?>"><br>
        <input type="submit">
      </form>
    <? endif; ?>
  </div>
</div>