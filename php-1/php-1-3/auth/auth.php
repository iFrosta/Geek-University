<?php
$login = "admin";
$pass = "1232";

$user = "Гость";
$auth = false;

if ($login == "admin" && $pass == "123") {
    $user = $login;
    $auth = true;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<? if ($auth):?>
Добро пожаловать <?=$user?>
<?else:?>
<form>
    <input type="text">
    <input type="password">
    <input type="submit" value="Войти">
</form>
<?endif;?>
</body>
</html>