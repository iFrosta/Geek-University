<?
function cart(&$params, $action, $id)
{
  if ($action == "addCart") {
    $error = addToCart($id);
    header("Location: /preview/$id"); // Обязательно закрывающий /
  }

//  if ($action == "delete") {
//    $error = deleteImgFeedback($id);
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
//  }

  return $params;
}

function addToCart($id)
{
  $db = getDb();
  $sessionID = session_id();
  $sql = "INSERT INTO `cart`(`id`, `id_good`, `id_session`) VALUES (NULL,'{$id}','{$sessionID}')";
  return executeQuery($sql);
}

function updateCartOf($id)
{
  $sessionID = session_id();
  $db = getDb();
// Обновляем views count = views + current view
  $sql = "UPDATE cart SET `id_good`= {$id}, `id_session`={$sessionID} WHERE 1";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function getCart()
{
  $sessionID = session_id();

  $sql = "SELECT * FROM cart WHERE id_session = '$sessionID'";
  $gallery = getAssocResult($sql);

  $result = [];
  if (isset($gallery[0]))
    $result = $gallery[0];

  return $gallery;
}

function createSession()
{
  $sessionID = session_id();
  $db = getDb();
//  $sql = "SELECT * FROM cart WHERE `id_session` = '$sessionID'";
//  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
  $sql = "SELECT EXISTS(SELECT * FROM cart WHERE id_session = '$sessionID')";
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
//  $sql = "INSERT INTO `cart`(id_good,id_session) VALUES ('0','$sessionID')";

  return executeQuery($sql);
}

//  $sql = "
//          SELECT cart.id as cart_id,
//          goods.id as goods_id, goods.name as name, goods.price as price
//          FROM `cart`, `goods` WHERE 'id_session' = {$sessionID}
//          AND `cart` . `id_good` = `goods` . `id`";
//  $sql = "SELECT * FROM `cart`, `goods` WHERE 'id_session' = {$sessionID} AND `cart` . `id_good` = `goods` . `id`";