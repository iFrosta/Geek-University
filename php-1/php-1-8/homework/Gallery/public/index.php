<?php
session_start();
include "../config/main.php";

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$page = "";
$action = "";
$id = "";
if ($url_array[1] == "") {
  $page = "index";
  $id = "";
} else {
  $page = $url_array[1];
  if (!$url_array[2] == "") {
    if (is_numeric($url_array[2])) {
      $id = $url_array[2];
    } else {
      $action = $url_array[2];
      if (is_numeric($url_array[3])) {
        $id = $url_array[3];
      }
    }
  }
}

$params = prepareVariables($page, $action, $id);
echo render($page, $params);
closeDb();