 <nav>
   <a href="/">Галерея</a>
   <a href="/feedback/">Отзывы</a>
<!--   <a href="/basket/">Корзина</a>-->
 </nav>
<div class="auth">
  <span>Добро пожаловать <?= $user ?></span>
  <? if (!$allow) echo "
    <form>
      <input type='text' name='login' placeholder='Логин'>
      <input type='password' name='pass' placeholder='Пароль'>
      Save? <input type='checkbox' name='save'>
      <input type='submit' name='send'>
    </form>";
  else echo "Добро пожаловать, {$user} <a href='?logout'>выход</a>";
  ?>
</div>
