<?php
//Файл констант
define("TEMLATES_DIR", '../views/');
define("LAYOUTS_DIR", 'layout/');
define("PUBLIC_DIR", '../public/');

// устанавливаем директорию файлов
define("filesPath", 'files/');
$small_path = filesPath . "small/";
$big_path = filesPath . "big/";

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'root');

//Тут же подключим основные функции нашего приложения, пока это render
//Можете кстати подключить и в главном index.php если такая вложенность напрягает
include_once "../engine/functions.php";
//include_once "../engine/log.php";
include_once "../engine/db.php";