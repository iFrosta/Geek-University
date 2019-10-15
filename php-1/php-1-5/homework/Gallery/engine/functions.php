<?php
//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page)
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
      $content = getGalleryContent($_GET['id']);
      $params['id'] = $content['id'];
      $params['views'] = $content['views'];
      updateViews();
      break;
  }
  return $params;
}

function updateViews(){
  $db = getDb();
  $id = $_GET['id'];
  // Обновляем views count = views + current view
  $sql = "UPDATE gallery SET `views`= `views` + 1 WHERE `id` = '".intval($id)."'";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function getGalleryContent($id){
  $id = (int)$id;

  $sql = "SELECT * FROM gallery WHERE id = {$id}";
  $gallery = getAssocResult($sql);

  //В случае если новости нет, вернем пустое значение
  $result = [];
  if(isset($gallery[0]))
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
