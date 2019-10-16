<?php
//КОНТРОЛЛЕР
function prepareVariables($page_name){
    $vars = [];
    switch ($page_name){
		
		//Переменные для главной страницы
        case "index":
				$vars["gallery"] = getImages();
            break;
			
		//Действия и переменные для страницы просмотра изображения
		case "show_image":
			//получаем индекс изображения
			$idx=(int)$_GET['idx'];

			//добавим лайки изображению с полученным индексом
			add_likes($idx);

			//подготовим переменные для шаблона
			$image = getOneImage($idx);

			$vars["image"] = $image['filename'];
			$vars["likes"] = $image['likes'];
           break;


    }

    return $vars;
}

//МОДЕЛЬ

	//увеличим число лайков на 1 одним запросом к базе
function add_likes($idx){
    $sql = "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$idx}";
    $row = executeQuery($sql);
}

	//функция возвращает имя файла по его idx
function getOneImage($idx){
    $sql = "SELECT filename,likes FROM `images` WHERE idx={$idx}";
    $row = getAssocResult($sql);
    //_log($row, "Изображение");
    return $row[0];
}	

	//функция возвращает ассоциативный массив со списком файлов из базы
function getImages(){
    $sql = "SELECT * FROM `images` ORDER BY likes DESC";
    $images = getAssocResult($sql);
	return $images;
}		
		


