<?php
include "../SQL.php";
$id = $_GET['idshopingcart'];

$QWE = mysqli_query($link, "DELETE FROM `shopingcart` WHERE `idshopingcart` = '$id'");
if ($QWE) {
    header("LOCATION: ../shoppingCart.php");
}


?>
