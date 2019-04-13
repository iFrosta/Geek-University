<?php

function renderTamplate($page, $content = '') {
    ob_start();
    include $page . '.php';
    return ob_get_clean();
}
echo renderTamplate('menu');
echo renderTamplate('main', 'Hello world');

