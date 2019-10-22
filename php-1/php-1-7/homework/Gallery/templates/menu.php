<p>
  <? if (!$allow) echo "
    <form>
      <input type='text' name='login' placeholder='Логин'>
      <input type='password' name='pass' placeholder='Пароль'>
      Save? <input type='checkbox' name='save'>
      <input type='submit' name='send'>
    </form>";
  else echo "Добро пожаловать, {$user} <a href='?logout'>выход</a>";
  ?>
  <span>Добро пожаловать <?= $user ?></span>
  <a href="/">Главная</a>
  <a href="/index/">Галерея</a>
  <a href="/feedback/">Отзывы</a>
</p>