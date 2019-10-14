<?php
// Проверяем нажата ли кнопка load
if (isset($_POST["load"])) {
  // присваиваем файл и возрвращаем ему его имя
  $path= "files/" . $_FILES["file"]["name"];
  // перемещаем файл в директорию files
 if  (move_uploaded_file($_FILES["file"]["tmp_name"], $path)) {
   echo "file uploaded <br>";
 } else {
   echo "Error <br>";
 }
}
?>

<form method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="name" autofocus>
  <input type="submit" name="load" value="Загрузить файл">`
</form>