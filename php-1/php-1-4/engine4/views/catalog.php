<h2>Каталог</h2>
<? foreach ($catalog as $item): ?>

<p><a href="?page=product"><?=$item?></a> </p>

<?endforeach;?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" name="load" value="Загрузить">
</form>
