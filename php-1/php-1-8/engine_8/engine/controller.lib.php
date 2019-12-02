<?php


function prepareVariables($page, $action, $id)
{
    $params = [];
    $params['is_ajax'] = false;
    $params['allow'] = false;
    $allow = false;
    if (is_auth()) {
        $allow = true;
        $params['user'] = get_user();
    }
    $params['allow'] = $allow;
    $params['ngoods'] = getBasketCount();

    switch ($page) {
        case 'index':
            break;

        case 'ajax':
            $params['is_ajax'] = true;
            if ($action == 'deleteFromBasket') {
                deleteFromBasket($id);
                $params['id'] = $id;
                $params['summ'] = getBasketSumm();

            }

            break;

        case 'basket':
            if (isset($_GET['message'])) {
                if ($_GET['message']=='ok')
                $params['message'] = "Заказ оформлен";
                //var_dump($params);
            }

            if ($action == 'add') {
              // makeOrder();
                session_regenerate_id();
               header("Location: /basket/?message=ok");
            }

            if ($action == 'buy') {
                addToBasket($id);
                header("Location: /catalog/");
            }
            $params['basket'] = getBasket();
            $params['summ'] = getBasketSumm();
            break;

        case 'logout':
            session_destroy();
            setcookie("hash");
            header("Location: /");
            break;

        case 'login':
            if (login()) {
          //     $params['allow'] = true;
          //     $params['user'] = get_user();
            }
            header("Location: /");
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
                doFeedbackActionImage($action, $id, $params);
            } else {

                doFeedbackActionImage($action, $id, $params);
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

           doFeedbackAction($action, $id, $params);

            break;


    }
    return $params;
}





