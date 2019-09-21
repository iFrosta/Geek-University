<?php

$file = fopen("chat.txt","a+");

$chat = [];

while (!feof($file)) {
    $chat = array_reverse($chat);
}

foreach ($chat as $value) {
    echo $value;
}

$message = strip_tags($_GET["chat"]);

if (!empty($message)) {
    fputs($file,$message . "\r\n");
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
