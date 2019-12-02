<?
$back=$_SERVER["REQUEST_URI"];
if (checkpass($login,$pass)) 
	echo "Добро пожаловать {$login}! <a href='?logout&back={$back}'>Выход</a>";
else
	echo "
<form id='order' action='' method='POST'>
	Привет гость, 
	<input type='text' name='login'>
	<input type='password' name='pass'>
	<input type='submit' name='loginform' value='Войти'>
</form>
";