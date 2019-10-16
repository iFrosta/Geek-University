<h2>Отзывы</h2>

<?=$error?>
<form action="/feedback/add/" method="post">
    Оставьте отзыв: <br>
    <input type="text" name="name" placeholder="Ваше имя"><br>
    <input type="text" name="message" placeholder="Ваш отзыв"><br>
    <input type="submit">
</form>




<?foreach ($feedback as $item): ?>
<p>
    <b><?=$item['name']?>:</b> <?=$item['feedback']?> <a href="/editfeedback/<?=$item['id']?>">[править]</a>  <a href="/feedback/delete/<?=$item['id']?>">[x]</a><br>
</p>
<?endforeach;?>


