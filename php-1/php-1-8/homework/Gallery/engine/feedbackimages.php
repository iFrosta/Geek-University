<?php
function doImgFeedbackAction(&$params, $action, $id)
{
  if ($action == "add") {
    $error = addImgFeedback($id);
    header("Location: /preview/$id"); // Обязательно закрывающий /
  }

  if ($action == "delete") {
    $error = deleteImgFeedback($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  if ($action == "edit") {
    if (isset($_POST['send'])) {
      updateImgFeedback($id);
      $backid = $_GET['backid'];
      header("Location: /preview/{$backid}/?status=edited");
    } else {
      $params['textAction'] = "Править";
      $params['formAction'] = "edit";
      $message = getImgFeedback($id);
      $params['name'] = $message['name'];
      $params['message'] = $message['feedback'];
      $params['id'] = $message['id'];
    }

  }
  if ($action == 'edit') {
    $params['feedback'] = getImgFeedback((int)$_GET['backid']);
  } else {
    $params['feedback'] = getImgFeedback($id);
  }

  return $params;
}

function updateImgFeedback($id)
{
  $db = getDb();
  $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
  $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
  $sql = "INSERT INTO `feedback-img`(`name`, `feedback`, `imgID`) VALUES ('{$name}','{$message}','{$id}')";
  return executeQuery($sql);
}

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
  return getAssocResult($sql);
}

function getAllImgFeedback()
{
  $sql = "SELECT * FROM `feedback-img` ORDER BY id DESC";
  return getAssocResult($sql);
}