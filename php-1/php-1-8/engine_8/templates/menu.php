<p>
    <a href="/">Главная</a>
    <a href="/news/">Новости</a>
    <a href="/catalog/">Каталог</a>
    <a href="/feedback/">Отзывы</a>
    <? if ($ngoods != 0): ?>
        <a href="/basket/">Корзина (<?=$ngoods?>)</a>
    <?else:?>
        <a href="/basket/">Корзина</a>
    <?endif;?>

    <? if ($allow): ?>
        Добро пожаловать, <?= $user ?> <a href='/logout/'>выход</a>
    <? else: ?>
<form method="post" action="/login/">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    Save? <input type='checkbox' name='save'>
    <input type='submit' name='send'>
</form>
<? endif; ?>

</p>