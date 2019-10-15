<link rel="stylesheet" type="text/css" href="css/main.css">
<h1>- Gallery -</h1>
<div class="Gallery">
  <? foreach ($gallery as $item): ?>
    <a class='photo' href='/preview/?id=<?= $item['id'] ?>.jpg'>
      <img src='<?= fileSmallPath;
      if ($item['id'] < 10) { // Т.к. название файлов до 10 имеет 0, добавляем 0
        echo '0';
      }
      echo $item['id'] . '.jpg' ?>' width="150" height="100"/></a>
  <? endforeach; ?>
</div>
<h2>- On engine -</h2>