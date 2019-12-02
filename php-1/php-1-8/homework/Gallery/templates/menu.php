<? $rndNum = rand(1, 15); ?>
<nav>
  <a href="/">Gallery</a>
  <a href="/preview/<?= $rndNum ?>">I'm Feeling Lucky</a>
  <a href="/feedback/">Feedback</a>

  <? if ($params['user'] === 'admin') { ?>
    <a href="/orders/">Orders</a>
  <? } else {
    echo 'admin 123';
  } ?>

  <? if ($ngoods != 0): ?>
    <a href="/cart/" class="cart"><img src="/img/icons/cart.svg">(<?= $ngoods ?>)</a>
  <? else: ?>
    <a href="/cart/" class="cart"><img src="/img/icons/cart.svg"></a>
  <? endif; ?>

</nav>
<div class="auth">
  <!--  <span>Welcome --><? //= $user ?><!--</span>-->
  <? if (!$allow) echo "
    <form method='POST' action='/login/'>
      <input type='text' name='login' placeholder='login'>
      <input type='password' name='pass' placeholder='password'>
      <input type='checkbox' name='save'> <strong>Save?</strong>
      <input type='submit' name='send' value='sign in'>
      <input type='submit' name='send' value='sign up'>
    </form>";
  else echo "Welcome, {$user} <a href='?logout'> выход</a>";
  ?>
</div>