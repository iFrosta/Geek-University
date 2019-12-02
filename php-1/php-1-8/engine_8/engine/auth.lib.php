<?php

function login() {
    if (isset($_POST['send'])) {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (!auth($login, $pass)) {
            Die('Не верный логин пароль');
        } else {
            if (isset($_POST['save'])) {
                $hash = uniqid(rand(), true);
                $db = getDb();
                $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
                $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
                $result = mysqli_query($db, $sql);
                setcookie("hash", $hash, time() + 3600);
                return true;
            }

             return true;


        }
    }
}


function auth($login, $pass)
{
    $db = getDb();
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
        $db = getDb();
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
