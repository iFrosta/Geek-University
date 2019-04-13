<?php
define("TEMLATES_DIR", './views/');
define("LAYOUTS_DIR", 'layout/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = [];
switch ($page) {
    case 'index':
        $params = [
            "username" => "Вася"
        ];
        break;
    case 'catalog':
        $params = ["catalog" => [
            "Спички",
            "Кружка",
            "Ведро"
        ]
        ];
        break;
    case 'api_catalog':
        $params = ["catalog" => [
            "Спички",
            "Кружка",
            "Ведро"
        ]
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
        die();

}

echo render($page, $params);


function render($page, $params = [])
{
    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params)
    ]);
}


function renderTamplate($page, $params = [])
{
    ob_start();

    if (!is_null($params)) {
        extract($params);
    }


    $fileName = TEMLATES_DIR . $page . '.php';

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы не существует, 404");
    }


    return ob_get_clean();
}


