<?
$sql = "UPDATE gallery SET `views`= `views` + 1 WHERE `id` = '".intval($id)."'";
$result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
?>
<link rel="stylesheet" type="text/css" href="../css/main.css">
<a style="color:black;" href="/index">< - Back</a>
<h1>- Image -</h1>
<div class="Gallery single">
  <a class='photo' href='/preview/?id=<?=$id?>.jpg'>
    <img src='../<?=$big?>'/></a>
  <div class='views'><?=$views?> views</div>
</div>