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
</div>