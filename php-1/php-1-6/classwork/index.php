<?php
$data = $_REQUEST;
if (isset($_POST['send'])) {
  header("Location: index.php");
}
?>
<form action="" method="post">
  <select name="animal">
    <option value="dog">Dog</option>
    <option value="cat">Cat</option>
    <option value="hamster">Hamster</option>
    <option value="parrot">Parrot</option>
    <option value="spider">Spider</option>
    <option value="goldfish">Goldfish</option>
  </select>
  <input type="text" name="login">
  <input type="submit" name="send">
</form>