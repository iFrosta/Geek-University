<?
session_start();
$id_good=(int)$_GET["id_good"];
$id_session=session_id();


$connect=mysqli_connect("localhost","root","","shop1");
//Проверим есть ли уже такой товар в корзине

$result=mysqli_query($connect,"SELECT col FROM `basket` 
WHERE `session`='{$id_session}' AND `id_good`={$id_good}");



$row=mysqli_fetch_assoc($result);
$col=$row["col"];

//если есть увеличим счетчик товара
if ($col!=null) {
    $result = mysqli_query($connect, "UPDATE `basket` SET `col`=`col`+1 
WHERE `session`='{$id_session}' AND `id_good`={$id_good};");
}
else
{
//если нет то просто добавим товар в корзину с количеством 1
$result=mysqli_query($connect,"INSERT INTO `basket` (`session`, `id_good`, `col`) 
VALUES ('{$id_session}', '{$id_good}', 1);");

}


header("Location: catalog.php");