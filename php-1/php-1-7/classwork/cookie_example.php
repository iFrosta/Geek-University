<?php
$secret_key = '123';
$cookie_key = $_COOKIE['key'];
$current_key = $_GET['key'];

$allow = false;

if (empty($current_key)) {
  if ($cookie_key == $secret_key)
    $allow = true;
} else {
  if ($current_key == $secret_key) {
    $allow = true;
    setcookie("key", "$current_key", time() + 3600);
  }
}

if (!$allow) Die ("Не верный ключ");
?>

Сайт...