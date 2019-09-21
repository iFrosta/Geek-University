<?php
include "../config/main.php";

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = [];
switch ($page) {
    case 'index':
        $error_message = "";
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 0) $error_message = 'Файл загружен!';
            if ($_GET['error'] == 1) $error_message = 'Ошибка загрузки!';
        }

        if ($_POST['load'] && $_FILES['myimg']) {
            $error = upload_file_to_gallery();

            header("Location: index.php?error={$error}");
        }
        $params = [
            "images" => create_img_array(),
            “error_message" => $error_message
        