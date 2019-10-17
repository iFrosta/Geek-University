<?php
define('SITE_TITLE', 'Урок 5');

define("TEMPLATES_DIR", "../templates/");
define("ENGINE_DIR", "../engine/");
define("LAYOUTS_DIR", "/layouts/");

/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'news');

include_once ENGINE_DIR . 'controller.php';
include_once ENGINE_DIR . 'db.php';
include_once ENGINE_DIR . 'log.php';
include_once ENGINE_DIR . 'feedback.php';
include_once ENGINE_DIR . 'feedbackgoods.php';
include_once ENGINE_DIR . 'images.php';
include_once ENGINE_DIR . 'news.php';
include_once ENGINE_DIR . 'render.php';