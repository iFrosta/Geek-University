<?php
//Файл констант
define("TEMLATES_DIR", '../templates/');
define("LAYOUTS_DIR", 'layout/');
define("ENGINE_DIR", "../engine/");
define("PUBLIC_DIR", '../public/');

define("SITE_TITLE", 'Gallery');

// устанавливаем директорию файлов
define("filesPath", 'files/');
define("fileSmallPath", 'files/small/');
define("fileBigPath", 'files/big/');

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'root');

//Тут же подключим основные функции нашего приложения, пока это render
//Можете кстати подключить и в главном index.php если такая вложенность напрягает
include_once ENGINE_DIR . "controller.php";
include_once ENGINE_DIR . "db.php";
include_once ENGINE_DIR . "render.php";

include_once ENGINE_DIR . "feedback.php";
include_once ENGINE_DIR . "feedbackimages.php";
include_once ENGINE_DIR . "images.php";
include_once ENGINE_DIR . "auth.php";