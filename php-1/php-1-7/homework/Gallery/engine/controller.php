<?php
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
      $params["db"] = getDb();
      $params["gallery"] = getGallery();
      break;
    case 'preview':
      if (empty($id)) {
        Die("Файла не существует, 404");
      } else {
        $content = getGalleryContent($id);
        $params['id'] = $content['id'];
        $params['views'] = $content['views'];
        updateViews($id);
        doImgFeedbackAction($params, $action, $id);
        $params['feedback'] = getImgFeedback($id);
        if (empty($params['feedback'])) {
          $params['nofeedback'] = 'Будьте первым кто оставит отзыв!';
        }
      }
      break;
    case 'feedback':
      doFeedbackAction($params, $action, $id);
      $params['submitVal'] = 'Отправить';
      $params['feedback'] = getAllFeedback();
      break;
  }
  return $params;
}