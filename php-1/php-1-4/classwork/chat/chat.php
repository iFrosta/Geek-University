<!--Перезапуска страницу каждый 3 секунды-->
<meta http-equiv="Refresh" content="3">
<?
// Открываем файл на чтение
$file = fopen("chat.txt", "r");
// Создаем пустой масив
$chat = [];
// Построчно читаем файл пока указатель файла не достигнет конца !feof()
while (!feof($file)) {
  $chat[] = fgets($file) . "<br>";
  // Разворачиваем массив
  $chat = array_reverse($chat);
  // циклом перебора каждого элемента выводим каждый элемент
  foreach ($chat as $value) {
    echo $value;
  }
}
