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

function doImgFeedbackAction(&$params, $action, $id)
{

  if ($_GET['status'] == 1) {
    $params['error'] = "Отзыв добавлен!";
  }
  if ($_GET['status'] == 2) {
    $params['error'] = "Отзыв удален!";
  }
  if ($_GET['status'] == 3) {
    $params['error'] = "Отзыв отредактирован!";
  }

  if ($action == "add") {
    $error = addImgFeedback($id);
    header("Location: /preview/$id/?status=1"); // Обязательно закрывающий /
  }

  if ($action == "delete") {
    $error = deleteImgFeedback($id);
    header("Location: /preview/$id/?status=2"); // Обязательно закрывающий /
  }

  if ($action == "edit") {
    $error = editImgFeedBack($id);
    // header("Location: /feedback/?status=3"); // Обязательно закрывающий /
    $params['submitVal'] = 'Изменить отзыв';
    $params['name'] = 'Изменить отзыв';
    $params['feedback'] = 'Изменить отзыв';
    // header("Location: /feedback/?status=3"); // Обязательно закрывающий /
  }
}

function doFeedbackAction(&$params, $action, $id)
{
  if ($_GET['status'] == 1) {
    $params['error'] = "Отзыв добавлен!";
  }
  if ($_GET['status'] == 2) {
    $params['error'] = "Отзыв удален!";
  }
  if ($_GET['status'] == 3) {
    $params['error'] = "Отзыв отредактирован!";
  }

  if ($action == "add") {
    $error = addFeedBack();
    header("Location: /feedback/?status=1"); // Обязательно закрывающий /
  }

  if ($action == "delete") {
    $error = deleteFeedback($id);
    header("Location: /feedback/?status=2"); // Обязательно закрывающий /
  }

  if ($action == "edit") {
    $error = editFeedBack($id);
    // header("Location: /feedback/?status=3"); // Обязательно закрывающий /
    $params['submitVal'] = 'Изменить отзыв';
    $params['name'] = 'Изменить отзыв';
    $params['feedback'] = 'Изменить отзыв';
    // header("Location: /feedback/?status=3"); // Обязательно закрывающий /
  }
}

// Feedback
function editFeedBack($id)
{
  $sql = "SELECT * FROM  `feedback` WHERE id={$id}";
  $item = getAssocResult($sql);
  var_dump($item);
  $name = $item[0]['name'];
  $message = $item[0]['feedback'];
  echo $name . ' - ' . $message;
  return executeQuery($sql);
}

function deleteFeedback($id)
{
  $sql = "DELETE FROM `feedback` WHERE id={$id}";
  return executeQuery($sql);
}

function addFeedBack()
{
  $db = getDb();
  $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
  $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
  $sql = "INSERT INTO `feedback`(`name`, `feedback`) VALUES ('{$name}','{$message}')";
  return executeQuery($sql);
}

function getAllFeedback()
{
  $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
  return getAssocResult($sql);
}
// END Feedback

// Img Feedback
function deleteImgFeedback($id)
{
  $sql = "DELETE FROM `feedback-img` WHERE id={$id}";
  return executeQuery($sql);
}

function addImgFeedback($id)
{
  $db = getDb();
  $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
  $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
  $sql = "INSERT INTO `feedback-img`(`name`, `feedback`, `imgID`) VALUES ('{$name}','{$message}','{$id}')";
  return executeQuery($sql);
}

function getImgFeedback($id)
{
  $sql = "SELECT * FROM `feedback-img` WHERE `imgID` = {$id}";
//  $sql = "SELECT * FROM `feedback-img` WHERE id={$id}";
  return getAssocResult($sql);
}

function getAllImgFeedback()
{
  $sql = "SELECT * FROM `feedback-img` ORDER BY id DESC";
  return getAssocResult($sql);
}
// END Img Feedback

// Img views
function updateViews($id)
{
  $db = getDb();
  // Обновляем views count = views + current view
  $sql = "UPDATE gallery SET `views`= `views` + 1 WHERE `id` = '" . $id . "'";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function getGalleryContent($id)
{
  $id = (int)$id;

  $sql = "SELECT * FROM gallery WHERE id = {$id}";
  $gallery = getAssocResult($sql);

  //В случае если новости нет, вернем пустое значение
  $result = [];
  if (isset($gallery[0]))
    $result = $gallery[0];

  return $result;
}

function getGallery()
{
  $sql = "SELECT * FROM gallery ORDER BY views DESC";
  $gallery = getAssocResult($sql);
  return $gallery;
}

//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, $params = [])
{

  return renderTamplate(LAYOUTS_DIR . 'layout', [
    "content" => renderTamplate($page, $params)
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
