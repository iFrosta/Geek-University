<?
session_start();
include "auth.php";
//посчитаем количество товаров в корзине
$id_session=session_id();
$connect=mysqli_connect("localhost","root","","shop1");
$result=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row=mysqli_fetch_assoc($result);
$goods=$row["sum"];



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Интернет-магазин ноутбуков</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
</head>
<body> 
<div id="container">
    <header>
    <div class="logotip">
        <a href='index.html'><img src="img/logotip.png" alt="Логотип сайта" title="Магазин ноутбуков"></a>
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
        <h1>Интернет-магазин ноутбуков</h1>
        <p class="hello">Добро пожаловать в наш интернет-магазин ноутбуков, у нас огромный ассортимент комплектующих и расходных материалов для ремонта ноутбуков, планшетов и телефонов. </p>
        <hr>
		
		

		
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