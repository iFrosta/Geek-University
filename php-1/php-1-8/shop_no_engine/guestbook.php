<?
session_start();
include "auth.php";
$id_session=session_id();


$connect=mysqli_connect("localhost","root","","shop1");

if (isset($_POST["submit"])) {
$name=strip_tags(mysqli_real_escape_string($connect,$_POST["name"]));
$email=strip_tags(mysqli_real_escape_string($connect,$_POST["email"]));
$text=strip_tags(mysqli_real_escape_string($connect,$_POST["text"]));	
$data=date("Y-m-d");
$result=mysqli_query($connect,"INSERT INTO `guestbook` (`name`, `email`, `text`, `data`)
 VALUES ('{$name}', '{$email}', '{$text}', '{$data}');");
header("Location: guestbook.php");
}
 
 //Посчитаем количество товаров
$result2=mysqli_query($connect,"SELECT sum(col) as sum FROM `basket` WHERE `session`='{$id_session}';");
$row2=mysqli_fetch_assoc($result2);
$goods=$row2["sum"]; 

 //Получим все отзывы
$result=mysqli_query($connect,"SELECT * FROM `guestbook` WHERE 1;");


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
     <h1>Гостевая книга</h1>

		
		<? while ($row=mysqli_fetch_assoc($result)) {
			echo "
			 <div style='border: 1px solid #ccc; margin: 10px; padding: 5px;;'>
		ФИО: {$row[name]}<br>
		Email: {$row[email]}<br>
		Текст: {$row[text]}<br>
		<i>Дата: {$row[data]}</i>
		</div>
		";
			
		}
		
		
		?>
		
       
		
		<form id="order" action="" method="POST" >
            <p><strong>Оставить отзыв о сайте:</strong></p>
            <p>Введите ФИО: <input type="text" name="name" maxlength="30" required></p>
            <p>Введите Email: <input type="email" name="email" maxlength="20" required></p>
            <p>Введите Текст: <br><textarea name="text" rows="10" required></textarea></p>
            <p><input class='add-to-basket' type="submit" name="submit"></p>
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