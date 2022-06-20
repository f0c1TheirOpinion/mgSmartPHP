<?
if ($_COOKIE['loginAdmin']){
    include '../SQL.php';
    $id=$_GET['id'];

    $QWE = mysqli_query($link, "DELETE FROM `orders` WHERE `idOrders` = '$id'");
    if ($QWE) {
        header("LOCATION: ./ordersTable.php");
    }
}else
    include "404.php";
?>
