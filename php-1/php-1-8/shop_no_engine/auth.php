<?
$login=$_SESSION["login"];
$pass=$_SESSION["pass"];

function checkpass($login,$pass) {
	return ($login=="admin" && $pass=="123"); 
}

function is_admin($login,$pass) {
	return ($login=="admin" && $pass=="123"); 
}

if (isset($_POST["loginform"])) {
	$login=strip_tags($_POST["login"]);	
	$pass=strip_tags($_POST["pass"]);	
	$_SESSION["login"]=$login;
	$_SESSION["pass"]=$pass;

}

if (isset($_GET["logout"])) {
	$back=$_GET["back"];
	unset($_SESSION["login"]);
	unset($_SESSION["pass"]);
	header("Location: {$back}");
}