<?
function ShowOrders(&$params, $action, $id)
{

//  if ($action == "addOrder") {
//    $error = addToCart($id);
//    header("Location: /preview/$id");
//  }

  if ($action == "delete") {
    $error = deleteOrder($id);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

//  if (!empty($_POST['name'])) {
//    $error = placeOrder();
//    header("Location: /cart/?status=2");
//  }

  return $params;
}

function deleteOrder($id)
{
  $sessionID = session_id();
  $sql = "DELETE FROM `orders` WHERE id = '$id'";
  return executeQuery($sql);
}

function getOneOrder($sessionID)
{
//  $sql = "SELECT * FROM basket,orders WHERE basket.id_session=orders.id_session AND orders.id_orders='$id'";
  $sql = "SELECT * FROM cart WHERE id_session = '$sessionID'";
  $gallery = getAssocResult($sql);

  return $gallery;
}

function getAllOrders()
{
  $sql = "SELECT * FROM orders";
  $gallery = getAssocResult($sql);

  $result = [];
  if (isset($gallery[0]))
    $result = $gallery[0];

  return $gallery;
}
