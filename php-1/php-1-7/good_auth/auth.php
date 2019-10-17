<?
session_start();
//define("SALT", "tfg45gyj4ggdgsag4534g4hergsdf34tgeg");
$allow = false;

if (isset($_GET['logout'])) {
    session_destroy();
    setcookie("hash");
    header("Location: /");
}

if (is_auth()) {
    $allow = true;
    $user = get_user();
}


if (isset($_GET['send'])) {
    $login = $_GET['login'];
    $pass = $_GET['pass'];

    if (!auth($login, $pass)) {
        Die('Не верный логин пароль');
    } else {
        if (isset($_GET['save'])) {
            $hash = uniqid(rand(), true);
            $db = get_db();
            $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
            $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
            $result = mysqli_query($db, $sql);
            setcookie("hash", $hash, time() + 3600);
        header("Location: /");
        }
        $allow = true;
        $user = get_user();


    }
}

function get_db() {
    static $db = '';
    if (empty($db)) {
        $db = mysqli_connect('localhost', 'root', '', 'news');
    }
    return $db;
}

function auth($login, $pass)
{
    $db = get_db();
    $login = mysqli_real_escape_string($db, strip_tags(stripslashes($login)));
    /*
        $options = [
            'cost' => 11,
            'salt' => SALT
        ];
    */
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['pass'])) {
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $row['id'];
        return true;
    }
    return false;
}

function is_auth()
{
    if (isset($_COOKIE["hash"])) {
        $hash = $_COOKIE["hash"];
        $db = get_db();
        $sql = "SELECT * FROM `users` WHERE `hash`='{$hash}'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = $row['login'];
        if (!empty($user)) {
            $_SESSION['login'] = $user;
        }
    }
    return isset($_SESSION['login']) ? true : false;
}

function get_user()
{
    return is_auth() ? $_SESSION['login'] : false;
}

if (!$allow) echo "
<form>
	<input type='text' name='login' placeholder='Логин'>
	<input type='password' name='pass' placeholder='Пароль'>
	Save? <input type='checkbox' name='save'>
	<input type='submit' name='send'>
</form>
";
else echo "Добро пожаловать, {$user} <a href='?logout'>выход</a>";


