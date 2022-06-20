<?php
include "../SQL.php";
$idUsersCart = $_COOKIE["idUser"];

$QWE = mysqli_query($link, "DELETE FROM `shopingcart` WHERE `idUsersCart` = '$idUsersCart'");
if ($QWE) {
    header("LOCATION: ../shoppingCart.php");
}


?>
