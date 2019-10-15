<link rel="stylesheet" type="text/css" href="css/main.css">
<h1>- Gallery -</h1>
<div class="Gallery">
  <? foreach ($gallery as $item): ?>
    <a class='photo' href='/preview/?id=<?= $item['id'] ?>.jpg'>
      <img src='<?= $item['small'] ?>' width="150" height="100"/></a>
  <? endforeach; ?>
</div>
<h2>- On engine -</h2>