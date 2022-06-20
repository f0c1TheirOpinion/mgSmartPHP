<?php
include "../SQL.php";

$idshopingcart=$_GET['idshopingcart'];
$plusMinus = $_GET['plusMinus'];
$quantity = $_GET['quantity'];
if($plusMinus == "plus"){
$quantity++;
    $QWE = mysqli_query($link, "UPDATE `shopingcart` SET `quantitySmartCart`='$quantity'
 WHERE `idshopingcart`='$idshopingcart'");
    header("LOCATION: ../shoppingCart.php");
}



    if ($plusMinus == "minus" && $quantity > 1) {
        $quantity--;
        $QWE = mysqli_query($link, "UPDATE `shopingcart` SET `quantitySmartCart`='$quantity'
 WHERE `idshopingcart`='$idshopingcart'");
        header("LOCATION: ../shoppingCart.php");

}else{
        header("LOCATION: ../shoppingCart.php");
    }



?>
