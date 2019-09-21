<?php
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include "../config/main.php";


//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}


//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];
switch ($page) {
    case 'index':
        $params = [
            "username" => "Вася"
        ];
        break;
    case 'catalog':

       // var_dump($_FILES);
        if ($_POST['load']) {
           // echo "Загружаем файл";
            header("Location: ?page=catalog");
        }
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
//пример использования модуля для логирования данных
//можно использовать для отладки, смотреть результат
//в папке _log в public, она будет создана автоматически
_log($page);
_log($params, 'params');
//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);



