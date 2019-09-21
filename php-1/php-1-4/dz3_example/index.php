<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 2019-02-06
 * Time: 09:40
 */
define("TEMPLATES_DIR", "./templates/");
define("TEMPLATES_EXTENSION", ".php");
define("DOMAIN_PATH", "./");// domain name on mine local server, NEEDS FOR NAVIGATION ON SITE

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

date_default_timezone_set('Europe/Moscow');
$params = [
    'title' => 'Homework 3',
    'menu' => getMenu(),
    'content' => '',
    'footer' => date("H:i M j Y D"),
];
if ($page >= 1 && $page <= 9) {
    $params['content'] = getTask($page);
} else {
    $params['content'] = " There's nothing here";
}
echo render($params);

/**
 * Function that render the whole page
 * @param array $params - parameters
 * @return string with rendered whole page
 */
function render(array $params = []) {
    extract($params);
    return renderTemplate('layout', $params);
}

/**
 * Function that render template with content
 * @param string $template - name of template
 * @param array $params - data for template
 * @return string with rendered template
 */
function renderTemplate($template, $params = []) {

    ob_start();
    if (!is_null($params) && is_array($params)) {
        extract($params);
    }
    $file = TEMPLATES_DIR . $template . TEMPLATES_EXTENSION;
    if (file_exists($file)) {
        include $file;
    } else {
        Die('Страницы не существует 404');
    }
    return ob_get_clean();
}

function getMenu() {
    return [1, 2, 3, 4, 5, 6, 7, 8, 9];
}

function getTask($index) {
    return include 'task' . $index . '.php';
}
