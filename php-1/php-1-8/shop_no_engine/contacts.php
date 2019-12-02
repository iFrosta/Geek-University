<?
session_start();
include "auth.php";
$id_session=session_id();
$connect=mysqli_connect("localhost","root","","shop1");
 //Посчитаем количество товаров
$result2=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row2=mysqli_fetch_assoc($result2);
$goods=$row2["sum"];
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
         <h1>Наш адрес:</h1>
        <p><b>Телефон:</b> 8 495 647-93-12</p>
        <p><b>Адрес:</b> г. Москва, 2-я улица Машиностроения, дом 11</p>
        <p><b>Email:</b> noutbuk@mail.ru</p>
        <p>Мы один из самых крупных складов комплектующих для ноутбуков в Москве. Центральный офис нашей компании расположен в Москве, а филиалы находятся в нескольких крупных городах России и ближнего зарубежья: Санкт-Петербург, Саратов, Нижний Новгород, Волгоград, Омск, Минск. Отлаженная логистика позволяет максимально уменьшить сроки доставки по Москве и в регионы.</p>
        <div class="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3c1948155bb548fe663673b36ab421c033da92c82f0cd30937890052e747cb8c&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
        <hr>
        <h2>Напишите нам:</h2>
        <form action="#" class="form-item" method="post">
           <p>
               <label for="display-name">Имя:</label>
               <input type="text" id="display-name" name="display-name" size="30" maxlength="20" placeholder="Введите Имя" required>
            </p>
            <p>
               <label for="display-mail">Email:</label>
               <input type="text" id="display-mail" name="display-mail" size="30" maxlength="20" placeholder="Введите Email" required>
            </p>
            <p>
               <label for="display-text">Тема:</label>
               <textarea id="display-text" cols="37" rows="10" maxlength="400"  required></textarea>
            </p>
            <p><input type="submit"></p>
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