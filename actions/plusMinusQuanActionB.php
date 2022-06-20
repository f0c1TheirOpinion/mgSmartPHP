<?php
include "../SQL.php";

$idshopingcard=$_GET['idshopingcard'];
$plusMinus = $_GET['plusMinus'];
$quantity = $_GET['quantity'];
if($plusMinus == "plus"){
$quantity++;
    $QWE = mysqli_query($link, "UPDATE `shopingcard` SET `quantitySmartCard`='$quantity'
 WHERE `idshopingcard`='$idshopingcard'");
    header("LOCATION: ../shoppingCart.php");
}



    if ($plusMinus == "minus" && $quantity > 1) {
        $quantity--;
        $QWE = mysqli_query($link, "UPDATE `shopingcard` SET `quantitySmartCard`='$quantity'
 WHERE `idshopingcard`='$idshopingcard'");
        header("LOCATION: ../shoppingCart.php");

}else{
        header("LOCATION: ../shoppingCart.php");
    }



?>
