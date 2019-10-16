<?php
// 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление.
// Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.

$op1 = (float)$_POST['op1'];
$op2 = (float)$_POST['op2'];
$func = $_POST['operation'];

switch ($func) {
  case 'sum':
    $result=$op1+$op2;
    $show = ' + ';
    break;
  case 'min':
    $result=$op1-$op2;
    $show = ' - ';
    break;
  case 'mul':
    $result=$op1*$op2;
    $show = ' * ';
    break;
  case 'div':
    if ($op2 != 0) {
      $result=$op1/$op2;
      $show = ' / ';
    } else {
      $result = ' делить нельзя';
      $show = ' на ';
    }
    break;
}
?>
<style type="text/css">
  body {
    width: 100%;
    height: 100%;
  }
  .wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
  }
  h1 {
    margin: 10px auto;
    text-align: center;
  }
  input {
    text-align: center;
    width: 40px;
    height: 20px;
  }
  .result {
    margin: 10px auto;
    color: crimson;
    font-weight: 700;
  }
  form {
    margin: 0 auto;
  }
</style>
<div class="wrapper">
  <h1>- Calculator -</h1>
  <form method="post">
    <input type="text" name="op1" id="val1" value="<?=$op1?>">
    <select name="operation">
      <option value="sum">+</option>
      <option value="min">-</option>
      <option value="mul">*</option>
      <option value="div">/</option>
    </select>
    <input type="text" name="op2" id="val3" value="<?=$op2?>">
    <input type="submit" value="=">
  </form>
  <?= '<div class="result">' . $op1 .  $show . $op2 . ' = ' . $result . '</div>';?>
</div>