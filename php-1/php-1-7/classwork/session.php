<?php
session_start();
$secret_key = '123';

$login = $_COOKIE['login'];
$session_key = $_SESSION['pass'];
$cookie_key = $_COOKIE['key'];

if (isset($_GET['pass'])) {
  $current_key = $_GET['pass'];
}

if (isset($_GET['login'])) {
  $login = $_GET['login'];
}

$allow = false;

if (isset($_GET['logout'])) {
  setcookie("key");
  session_destroy();
  header("location: index.php");
}

if (empty($current_key)) {
  if ($session_key == $secret_key) {
    $allow = true;
  } else {
    if ($cookie_key == $secret_key) {
      $allow = true;
    } else {
      if ($current_key == $secret_key) {
        $allow = true;
        $_SESSION['pass'] = $current_key;
        if (isset($_GET['save'])) {
          setcookie('key', $current_key, time() + 3600);
        }
        header("location: index.php");
      }
    }
  }
}


if (!$allow) {
  echo "<form action=\"\">
          <input type=\"text\" name=\"login\">
          <input type=\"password\" name=\"pass\">
          <input type='checkbox' name='save'> Save on this PC?
          <input type=\"submit\" name=\"send\">
        </form>";
} else {
  echo "Дщбро пожаловать " . $login . "! <a href='?logout'>Выход</a> ";
}
?>