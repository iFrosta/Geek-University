<html>
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="/datepicker.css" />
	<title>Результат загрузки файла</title>  
  </head>
<body>
<?php
 $uploaddir = 'images/foto/'; // Relative path under webroot
 $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//Проверка существует ли файл
if (file_exists($uploadfile)) { echo "Файл $uploadfile существует, выберите другое имя файла!"; exit;} 

//Проверка на размер файла 
   if($_FILES["userfile"]["size"] > 1024*1*1024)
   {
     echo ("Размер файла не больше 5 мб");
     exit;
   }
//Проверка расширения файла
$blacklist = array(".php", ".phtml", ".php3", ".php4");
 foreach ($blacklist as $item) {
  if(preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
   echo "Загрузка php-файлов запрещена!";
   exit;
   }
  }
//Проверка на тип файла
$imageinfo = getimagesize($_FILES['userfile']['tmp_name']);
 if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
  echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
  exit;
 }

 if($_FILES['userfile']['type'] != "image/jpeg") {
   echo "Можно загружать только jpg-файлы.";
   exit;
 }
 
 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
   echo "Файл успешно загружен.\n";
 } else {
   echo "Загрузка не получилась.\n";
 }
?>
<br><br>

</body>
</html>


