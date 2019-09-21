<?php
$menu = [
	[
		"title" => "Главная",
		"href" => "/"
	],
	[
		"title" => "Каталог",
		"href" => "/catalog/",
		"subitems" => [
			[
				"title" => "Автомобили",
				"href" => "/catalog/goods/"
			],
			[
				"title" => "Самолоеты",
				"href" => "/catalog/goods/",
				"subitems" => [
						[
							"title" => "Военные",
							"href" => "/catalog/goods/"
						],
						[
							"title" => "Гражданские",
							"href" => "/catalog/goods/"
						]
					]
			]
		]
	],
	[
		"title" => "Корабли",
		"href" => "/catalog/goods/"
	],
];

echo "<ul>" . menuRender($menu) . "</ul>";


function menuRender($menu_array){
    $result = "";
	foreach($menu_array as $item){
		$result .= "<li><a href='{$item['href']}'>{$item['title']}</a>";
		
		if(isset($item["subitems"])){
			$result .= "<ul>";
			$result .= menuRender($item["subitems"]);
			$result .= "</ul>";
		}
		
		$result .= "</li>";
	}
	
	return $result;
}



