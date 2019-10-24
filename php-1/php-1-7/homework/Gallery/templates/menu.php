<? $rndNum = rand(1, 15); ?>
<nav>
  <a href="/">Gallery</a>
  <a href="/preview/<?= $rndNum ?>">I'm Feeling Lucky</a>
  <a href="/feedback/">Feedback</a>
  <a href="/cart/" class="cart"><img src="/img/icons/cart.svg"></a>
</nav>
<div class="auth">
  <span>Welcome <?= $user ?></span>
  <? if (!$allow) echo "
    <form>
      <input type='text' name='login' placeholder='login'>
      <input type='password' name='pass' placeholder='password'>
      <input type='checkbox' name='save'> <strong>Save?</strong>
      <input type='submit' name='send' value='sign in'>
    </form>";
  else echo "Welcome, {$user} <a href='?logout'>выход</a>";
  ?>
</div>