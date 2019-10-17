<?php
$secret_key = '123';

$login = $_COOKIE['login'];
$cookie_key = $_COOKIE['key'];

if (isset($_GET['pass'])) {
  $current_key = $_GET['pass'];}

if (isset($_GET['login'])) {
  $login = $_GET['login'];
}

$allow = false;

if (isset($_GET['logout'])) {
  setcookie("key");
  header("location: index.php");
}

if (empty($current_key)) {
  if ($cookie_key == $secret_key)
    $allow = true;
} else {
  if ($current_key == $secret_key) {
    $allow = true;
    setcookie("key", "$current_key", time() + 3600);
    setcookie("login", "$login", time() + 3600);
    header("location: index.php");
  }
}

if (!$allow) {
  echo "<form action=\"\">
          <input type=\"text\" name=\"login\">
          <input type=\"password\" name=\"pass\">
          <input type=\"submit\" name=\"send\">
        </form>";
} else {
  echo "Дщбро пожаловать " . $login ."! <a href='?logout'>Выход</a> ";
}
?>