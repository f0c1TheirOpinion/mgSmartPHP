<?
setcookie("loginAdmin", "", time() - 3600*24*30*12, "/");


header("Location: ./login.php"); exit;

?>
