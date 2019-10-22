<?php
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