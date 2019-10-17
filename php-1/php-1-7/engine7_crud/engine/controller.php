<?php


function prepareVariables($page, $action, $id)
{
    $params = [];
    $params['is_ajax'] = false;
    switch ($page) {
        case 'index':
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'newspage':
            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'catalog':

            $params['images'] = getImages();

            break;

        case "image":
            //получаем индекс изображения


            if ($action != 'edit') {
                $id = (int)$id;
                $params = doFeedbackActionImage($action, $id);
            } else {

                $params = doFeedbackActionImage($action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];

            }


            //добавим лайки изображению с полученным индексом
            add_likes($id);

            //подготовим переменные для шаблона
            $image = getOneImage($id);



            $params['image'] = $image['filename'];
            $params['likes'] = $image['likes'];
            $params['id'] = $image['idx'];

            break;


        case "addlike":
            $id = (int)$_POST['id'];
            add_likes($id);
            $image = getOneImage($id);
            $params['likes'] = $image['likes'];
            $params['is_ajax'] = true;
            break;

        case "feedback":

           $params = doFeedbackAction($action, $id);

            break;


    }
    return $params;
}





