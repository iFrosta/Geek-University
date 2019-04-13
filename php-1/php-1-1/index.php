<?
$title = "<title>Главная страница - страница обо мне</title>";
$h1 = "<h1>Информация обо мне</h1>";
$year = 2019;

$content = file_get_contents("site.php");

$content = str_replace("{{TITLE}}", $title, $content);
$content = str_replace("{{H1}}", $h1, $content);
$content = str_replace("{{YEAR}}", $year, $content);

echo $content;
