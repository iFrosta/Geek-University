<?
session_start();
include "auth.php";
//Выберем товары в корзине
$id_session=session_id();
$connect=mysqli_connect("localhost","root","","shop1");
$result=mysqli_query($connect,"SELECT * FROM `goods`,`basket` 
WHERE `goods`.`idx`=`basket`.`id_good` AND `basket`.`session`='{$id_session}';");

//Посчитаем количество товаров
$result2=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row2=mysqli_fetch_assoc($result2);
$goods=$row2["sum"];

//Посчитаем сумму цен товаров
$result2=mysqli_query($connect,"SELECT sum(price*col) as sum FROM `goods`,`basket` 
WHERE `goods`.`idx`=`basket`.`id_good` AND `session`='{$id_session}';");
$row2=mysqli_fetch_assoc($result2);
$summ=$row2["sum"];


//Удалим товар из корзины
$action=strip_tags($_GET["action"]);
$idx=(int)$_GET["id_good"];
if ($action=="delete") {
	$result=mysqli_query($connect,"DELETE FROM `basket` 
		WHERE `basket`.`idx` = {$idx} AND `basket`.`session` = '{$id_session}';");
	header("Location:basket.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Ваша корзина</title>
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
			<li><a href="news.php">Новости</a></li>
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
        <h1>Ваша корзина</h1>
        <table border="1" cellpadding="5" cellspacing="0">
			<tr>
				<td>№</td><td>Наименование</td><td>Количество</td><td>Цена</td><td></td>
			</tr>
				<? 
				$n=1;
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tr>
							<td>{$n}</td>
							<td>{$row['name']}</td>
							<td>{$row['col']}</td>
							<td>{$row['price']}</td>
							<td><a href='?action=delete&id_good={$row['idx']}'>Удалить</a></td>
						</tr>";
					$n++;
				}
				?>
			<tr>
				<td colspan="5">Итого товаров на сумму: <?=$summ?> рублей.</td>
			</tr>
			
		</table>
		<br>
		<form id="order" action="order.php" method="POST">
			<p>Укажите дополнительную информацию для оформленя заказа</p>
			Ваше имя<br>
			<input type="text" name="name"><br><br>
			Телефон<br>
			<input required type="text" name="phone"><br><br>
			Адрес доставки<br>
			<input type="text" name="adres"><br><br>
			<input type="submit" class='add-to-basket' value="Оформить заказ">
		</form>
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