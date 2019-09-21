<?
if (isset($_POST["load"])) {
    $path = "upload/" . $_FILES["image"]["name"];
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
        echo "Файл загружен <br>";
    } else {
        echo "Ошибка <br>";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="load" value="Загрузить файл">
</form>