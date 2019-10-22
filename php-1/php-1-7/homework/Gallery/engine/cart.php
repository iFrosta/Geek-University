<?

session_id();

function updateCartOf($id)
{
$db = getDb();
// Обновляем views count = views + current view
$sql = "UPDATE goods SET `views`= `views` + 1 WHERE `id` = '" . $id . "'";
$result = @mysqli_query($db, $sql) or die(mysqli_error($db));
}

function getCartOf($id)
{
$id = (int)$id;

$sql = "SELECT * FROM goods WHERE id = {$id}";
$gallery = getAssocResult($sql);

//В случае если новости нет, вернем пустое значение
$result = [];
if (isset($gallery[0]))
$result = $gallery[0];

return $result;
}

function getCart()
{
$sql = "SELECT * FROM goods ORDER BY views DESC";
$gallery = getAssocResult($sql);
return $gallery;
}