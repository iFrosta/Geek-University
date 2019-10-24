<?php
function prepareVariables($page, $action, $id)
{
  $params = [];
  switch ($page) {
    case 'index':
      $params["gallery"] = getGallery();
      break;
    case 'preview':
      if (empty($id)) {
        Die("Файла не существует, 404");
      } else {
        $content = getGalleryContent($id);
        $params['nameImg'] = $content['name'];
        $params['id'] = $content['id'];
        $params['views'] = $content['views'];
        $params['description'] = $content['description'];
        $params['price'] = $content['price'];
        updateViews($id);
        doImgFeedbackAction($params, $action, $id);
        $params['feedback'] = getImgFeedback($id);
        if (empty($params['feedback'])) {
          $params['nofeedback'] = 'Будьте первым кто оставит отзыв!';
        }
        cart($params, $action, $id);
        if (!empty($params['added'])) {
          echo $params['added'];
        }
      }
      break;
    case 'feedback':
      doFeedbackAction($params, $action, $id);
      $params['submitVal'] = 'Отправить';
      $params['feedback'] = getAllFeedback();
      break;
    case 'cart':
      $params["cart"] = getCart();
      cart($params, $action, $id);
      break;
    case 'orders':
      $params["cart"] = getAllOrders();
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
  }
  return $params;
}