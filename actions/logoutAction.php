<?

setcookie("login", "", time() - 3600*24*30*12, "/");
setcookie("firstName", "", time() - 3600*24*30*12, "/");
setcookie("idUser", "", time() - 3600*24*30*12, "/");

header("Location: ../index.php"); exit;

?>
