<?php
// обрезаем теги + Берем сообщение из GET
$message = strip_tags($_GET["chat"]);
// Открываем файл чата
$file = fopen("chat.txt", "a+");
// проверяем есть ли что-то в переменной $message
if (!empty($message)) {
  // вписываем в файл сообщение
  fputs($file, $message . "\r\n");
  // Отправляем заголовок в URL для обнуления GET
  header("Location: index.php");
}
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chat</title>
</head>
<body>

<form>
  <input type="text" name="chat" id="name" autofocus>
  <input type="submit" value="Submit">
</form>

<iframe width="100%" height="600px" src="chat.php"></iframe>
</body>
</html>
