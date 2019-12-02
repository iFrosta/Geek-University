<div class="Gallery column">
<h2>Отзывы</h2>
<form action="/feedback/add/" method="post">
  Оставьте отзыв: <br>
  <input type="text" name="name" placeholder="Ваше Имя" value="<?=$name?>"><br>
  <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$message?>"><br>
  <input type="submit" value="<?=$submitVal?>">
</form>
<br>

<? foreach ($feedback as $item): ?>
<p>
  <b><?=$item['name']?> - </b> <?=$item['feedback']?>
  <a href="/feedback/edit/<?=$item['id']?>">[править]</a>
  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
</p>
<?endforeach;?>
</div>