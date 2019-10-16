<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    switch ($page) {


        case 'index':
            $params["username"] ="Вася";
            break;
        case 'news':

            $params["news"] = getNews();

            break;
        case 'newspage':
            if ($action=="addlike") {

                echo json_encode(["result" => 1]);
            }
            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();
            break;
    }

    return $params;
}

function doFeedbackAction(&$params, $action, $id) {
    if ($_GET['status'] == 1) {$params['error'] = "Отзыв добавлен!";}
    if ($_GET['status'] == 2) {$params['error'] = "Отзыв удален!";}

    if ($action == "add") {
        $error = addFeedBack();
        header("Location: /feedback/?status=1");

    }

    if ($action == "delete") {
        $error = deleteFeedback($id);

        header("Location: /feedback/?status=2");

    }
}

function deleteFeedback($id) {
    $sql = "DELETE FROM `feedback` WHERE id={$id}";
    return executeQuery($sql);
}

function addFeedBack() {
    $db = getDb();
    $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "INSERT INTO `feedback`(`name`, `feedback`) VALUES ('{$name}','{$message}')";
    return executeQuery($sql);
}

function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function getNewsContent($id){
    $id = (int)$id;

    $sql = "SELECT * FROM news WHERE id = {$id}";
    $news = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $result = [];
    if(isset($news[0]))
        $result = $news[0];

    return $result;
}


function getNews()
{
    $sql = "SELECT * FROM news";
    $news = getAssocResult($sql);
    // var_dump($news);
    return $news;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{

    return renderTamplate(LAYOUTS_DIR . 'layout', [
        "content" => renderTamplate($page, $params),
        "menu" => renderTamplate("menu")
    ]);
}


//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
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
