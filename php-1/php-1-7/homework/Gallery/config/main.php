<?php
//Файл констант
define("TEMLATES_DIR", '../templates/');
define("LAYOUTS_DIR", 'layout/');
define("PUBLIC_DIR", '../public/');

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
include_once "../engine/controller.php";
include_once "../engine/db.php";
include_once "../engine/feedback.php";
include_once "../engine/feedbackimages.php";
include_once "../engine/images.php";
include_once "../engine/news.php";
include_once "../engine/render.php";