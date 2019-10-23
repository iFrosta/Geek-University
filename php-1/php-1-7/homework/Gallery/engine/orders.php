<?
function ShowOrders(&$params, $action, $id)
{
//
//  if ($action == "addCart") {
//    $error = addToCart($id);
//    header("Location: /preview/$id");
//  }

  return $params;
}


function getAllOrders()
{
  $sql = "
          SELECT session as id_session,
          goods.id as goods_id, goods.name as name, goods.price as price
          FROM `cart`, `goods` WHERE 'id_session' = {$sessionID}
          AND `cart` . `id_good` = `goods` . `id`
          ";
  $gallery = getAssocResult($sql);

  $result = [];
  if (isset($gallery[0]))
    $result = $gallery[0];

  return $gallery;
}

//  $sql = "
//          SELECT cart.id as cart_id,
//          goods.id as goods_id, goods.name as name, goods.price as price
//          FROM `cart`, `goods` WHERE 'id_session' = {$sessionID}
//          AND `cart` . `id_good` = `goods` . `id`";
//  $sql = "SELECT * FROM `cart`, `goods` WHERE 'id_session' = {$sessionID} AND `cart` . `id_good` = `goods` . `id`";