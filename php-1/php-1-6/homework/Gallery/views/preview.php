<link rel="stylesheet" type="text/css" href="../css/main.css">
<a style="color:black;" href="/index">< - Back</a>
<h1>- Image -</h1>
<div class="Gallery single">
  <a class='photo' href='/preview/<?=$id?>'>
    <img src='../<?= fileBigPath;
    if ($id < 10) { // Т.к. название файлов до 10 имеет 0, добавляем 0
      echo '0';
    }
    echo $id . '.jpg' ?>'/></a>
  <div class='views'><?=$views?> views</div>
  <div class='feedback'>
    <? foreach ($feedback as $item): ?>
      <p>
        <b><?=$item['name']?> - </b> <?=$item['feedback']?>
        <a href="/preview/edit/<?=$item['id']?>">[edit]</a>
        <a href="/preview/delete/<?=$item['id']?>">[x]</a><br>
      </p>
    <?endforeach;?>
    <? foreach ($feedback as $item): ?>
    <form action="/preview/add/<?=$item['id']?>" method="post"><?endforeach;?><br>
      Оставьте отзыв: <br>
      <input type="text" name="name" placeholder="Ваше Имя" value="<?=$name?>"><br>
      <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$message?>"><br>
      <input type="submit">
    </form>
  </div>
</div>