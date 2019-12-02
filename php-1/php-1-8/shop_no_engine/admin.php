<?
session_start();
include "auth.php";
if (!is_admin($login,$pass)) header("Location: index.php");
//Получим список заказов
$id_session=session_id();
$connect=mysqli_connect("localhost","root","","shop1");
$result=mysqli_query($connect,"SELECT * FROM `orders` WHERE 1 ORDER BY status;");

//Посчитаем количество товаров
$result2=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row2=mysqli_fetch_assoc($result2);
$goods=$row2["sum"];



//Обработаем статус
$action=strip_tags($_GET["action"]);
$idx=(int)$_GET["idx"];
if ($action=="confirmed") {
	$result=mysqli_query($connect,"UPDATE `orders` SET `status` = '2' WHERE `orders`.`idx` = {$idx}");
	header("Location:admin.php");
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Админка</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
</head>
<body> 
<div id="container">
    <header>
    <div class="logotip">
        <a href='index.php'><img src="img/logotip.png" alt="Логотип сайта" title="Магазин ноутбуков"></a>
    </div>
</header>    <div class="leftblock">
        <nav>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="active">Главная</a></li>
            <li><a href="catalog.php">Каталог</a></li>
            <li><a href="guestbook.php">Отзывы</a></li>
            <li><a href="contacts.php">Контакты</a></li>
			<?
			if ($goods!=0)
				echo "<li><a href='basket.php'>Корзина ({$goods})</a></li>";

			if (is_admin($login,$pass))
				echo "<li><a href='admin.php'>Админка</a></li>";
			?>
        </ul>
    </div>
</nav>    </div>
    <div class="content">
	<? include "auth_form.php";?>
        <h1>Список заказов:</h1>
		
		<?
		$n=1;
		while ($row=mysqli_fetch_assoc($result)) {
			echo "<center>";
					$status="Новый";
					if ($row['status']==2) $status="Обработан";
					echo "{$n}: Имя:{$row['name']} Телефон: {$row['phone']}
					Адрес: {$row['adres']} Статус:	{$status} 
					<a href='?action=confirmed&idx={$row['idx']}'><button>Обработать</button></a><br>";
					$n++;
				
		?>
		</center>
        <table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>№</td><td>Наименование</td><td>Количество</td><td>Цена</td>
			</tr>
				<? 
				$result2=mysqli_query($connect,"SELECT * FROM `goods`,`basket` 
				WHERE `goods`.`idx`=`basket`.`id_good` AND `basket`.`session`='{$row['session']}';");
				//Посчитаем сумму цен товаров
				$result3=mysqli_query($connect,"SELECT sum(price*col) as sum FROM `goods`,`basket` 
				WHERE `goods`.`idx`=`basket`.`id_good` AND `session`='{$row['session']}';");
				$row3=mysqli_fetch_assoc($result3);
				$summ=$row3["sum"];
				$i=1;
				while ($row2=mysqli_fetch_assoc($result2)) {
					echo "<tr>
							<td>{$i}</td>
							<td>{$row2['name']}</td>
							<td>{$row2['col']}</td>
							<td>{$row2['price']}</td>
						</tr>";
					$i++;
				}
				echo "<tr>
				<td colspan='5'>Итого товаров на сумму: {$summ} рублей.</td>
			</tr>";
			echo "</table><br><br>";
			}
			
				?>

			
		

        </div>
    <footer>
        <div class="footer-menu">
    <div>
        <h4>Category</h4>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </div>
    <div>
        <h4>Our Account</h4>
        <ul>
            <li><a href="#">Discount</a></li>
            <li><a href="#">Addres</a></li>
            <li><a href="#">Search</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </div>
    <div>
        <h4>Category</h4>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
    </div>
    <div>
        <h4>About Us</h4>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenea
    </div>
</div>
<p>&copy; Все права защищены</p>    </footer>
</div>
</body>
</html>