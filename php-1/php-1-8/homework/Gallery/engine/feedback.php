<?
function updateFeedback()
{
  $db = getDb();
  $id = (int)$_POST["id"];
  $name = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['name'])));
  $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
  $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$message}' WHERE `feedback`.`id` = {$id};";

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

function deleteFeedback($id)
{
  $id = (int)$id;
  $sql = "DELETE FROM feedback WHERE id={$id}";
  return executeQuery($sql);
}

function getAllFeedback()
{
  $sql = "SELECT * FROM feedback ORDER BY id DESC";
  return getAssocResult($sql);
}

function doFeedbackAction($action, $id, &$params)
{
//  $params['textAction'] = "Добавить";
//  $params['formAction'] = "add";

  switch ($_GET['status']) {
    case 'ok':
      $params['status'] = "Сообщение добавлено";
      break;
    case 'deleted':
      $params['status'] = "Сообщение удалено";
      break;
    case 'edited':
      $params['status'] = "Сообщение изменено";
      break;
  }

  if ($action == "add" && isset($_POST['send'])) {
    addFeedBack();

    header("Location: /feedback/?status=ok");
  }

  if ($action == "delete") {
    delFeedBack($id);
    header("Location: /feedback/?status=deleted");
  }

  if ($action == "edit") {
    if (isset($_POST['send'])) {
      updateFeedback();
      header("Location: /feedback/?status=edited");
    } else {
      $params['textAction'] = "Править";
      $params['formAction'] = "edit";
      $message = getOneFeedBack($id);
      $params['name'] = $message['name'];
      $params['message'] = $message['feedback'];
      $params['id'] = $message['id'];
    }

  }

//  $params['feedback'] = getAllFeedback();

}