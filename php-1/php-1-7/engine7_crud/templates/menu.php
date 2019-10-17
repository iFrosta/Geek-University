<p>
<?if (!$allow):?>
<form action="">
    <input type="text">
    <input type="text">
</form>
<?else:?>
<p>Добро пожаловать <?=$user?></p>
<?endif;?>
    <a href="/">Главная</a>
    <a href="/news/">Новости</a>
    <a href="/catalog/">Каталог</a>
    <a href="/feedback/">Отзывы</a>
</p>