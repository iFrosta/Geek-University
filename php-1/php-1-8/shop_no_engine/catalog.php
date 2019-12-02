<?
session_start();
include "auth.php";
//посчитаем количество товаров в корзине
$id_session = session_id();
$connect=mysqli_connect("localhost","root","","shop1");
$result=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row=mysqli_fetch_assoc($result);
$goods=$row["sum"];

//выберем все товары
$result=mysqli_query($connect,"SELECT * FROM `goods` WHERE 1;");

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
        <a href='index.php'><img src="img/logotip.png" alt="Логотип сайта" title="Магазин ноутбуков"></a>
    </div>
</header>    <div class="leftblock">
        <nav>
    <div class="menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
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
        <h2>Каталог товаров</h2>
		
		<? 
		while ($row=mysqli_fetch_assoc($result))
		echo
                "<div class='item'>
				<form action='buy.php' method='GET'>
                    <img src='uploads/mini/{$row[image]}'>
                    <h3 class='item-name'>{$row['name']}</h3>
                    <p class='price'>{$row[price]} руб.</p>
                    <input class='add-to-basket' type='submit' value='Купить'>
					<input hidden type='text' name='id_good' value='{$row[idx]}'>
				</form>
					</div>";
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