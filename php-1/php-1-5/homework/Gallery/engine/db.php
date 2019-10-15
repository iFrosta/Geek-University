<?php
/* Модуль для работы с базой данных
 * набор функций для соединени и получения данных
 *
 */

/*
 * Функция, осуществляющая соединение с базой данных и возвращающее его
 * static позволяет сохранить состояние и вернуть уже текущее соединение
 * чтобы не делать нового
 */
function getDb() {

  static $db = null;

  if (is_null($db)) {
    $db = @mysqli_connect(HOST, USER, PASS, DB) or die("Could not connect: " . mysqli_connect_error());
  }

  return $db;
}

//При желании можно закрыть соединение (если уж и вызывать, то после render на главной)
function closeDb() {
  mysqli_close(getDb());
}

/**
 *  Данная функция предназначена для автоматической записи файлов в базу данных
 */
function fillDb()
{
  // Данный файл предназначен для автоматической записи файлов в базу данных
  $db = @mysqli_connect(HOST,USER,PASS,DB) or die("Error:" . mysqli_connect_error()); // затратная и долгая команлда - следует выполнять один раз

// устанавливаем директорию файлов
  define("filesPath", 'files/');
  $small_path = filesPath . "small/";
  $big_path = filesPath . "big/";

//  Отрезаем с помощью array_splice первые 2 элемента и читаем содержимое папки small - заносив переменную $small_arr
  $small_arr = array_splice(scandir($small_path), 2);

// Автоматический заполняем таблицу беря данные из filesPath
  for ($i = 0; $i < count($small_arr); $i++) {
    // присваиваем имя и путь к папкам
    $name = $i+1 . ".jpg";
    $small = $small_path . $small_arr[$i];
    $big = $big_path . $small_arr[$i];

    $sql = "INSERT INTO gallery(id, name, small, big, views, likes) VALUES ('$i+1','$name','$small','$big','0','0')";
    $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
  }
}

/*
 * Обертка для выполнения любого запроса
 * Передаем в параметре текст sql-запроса
 * Возвращаем результат, в основном использовать для
 * операций update и delete, которые не требуют возврата данных
 */
function executeQuery($sql)
{
  $db = getDb();

  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
  return $result;
}

/*
 * Обертка для выполнения запроса на получение данных
 * Данные возвращаются в виде ассоциативного массива
 * Цикл по получению данных уже реализован в этой функции
 */
function getAssocResult($sql)
{
  $db = getDb();
  $result = @mysqli_query($db, $sql) or die(mysqli_error($db));
  $array_result = [];
  while ($row = mysqli_fetch_assoc($result))
    $array_result[] = $row;
  return $array_result;
}