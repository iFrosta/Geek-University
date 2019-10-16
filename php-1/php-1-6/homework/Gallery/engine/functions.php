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
      }
      break;
    case 'feedback':

      if ($_GET['status'] == 1) {$params['error'] = "Отзыв добавлен!";}
      if ($_GET['status'] == 2) {$params['error'] = "Отзыв удален!";}

      if ($action == "add") {
        $error = addFeedBack();
        header("Location: /feedback/?status=1"); // Обязательно закрывающий /
      }

      if ($action == "delete") {
        $error = deleteFeedback($id);
        header("Location: /feedback/?status=2"); // Обязательно закрывающий /
      }

      $params['feedback'] = getAllFeedback();
      break;
  }
  return $params;
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
