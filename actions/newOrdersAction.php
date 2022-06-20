<?php
include "../SQL.php";

$data = $_POST;
$idUser =  $_COOKIE["idUser"];
$sql = "SELECT * FROM shopingcart WHERE `idUsersCart` = $idUser ";
$AddOr = $link->query($sql);
$result = $link->query($sql);
$result = mysqli_fetch_assoc($result);

$FIO = $data['FIO'];
$eMail = $data['eMail'];
$numberUser = $data['numberUser'];
$addressUser = $data['addressUser'];
$indexUser= $data['indexUser'];
$methodDelivary = $data['methodDelivary'];
$methodPay= $data['methodPay'];
$fullSumPriceFormat = $data['fullSumPriceFormat'];

$statusOrders = "Проверка";

class ordersForm {

    // Создаем функцию для отображения сообщения и отправик пользователя.
    public static function message ($message = '') {
        return '<script> alert("'.$message.'"); location.href = "../shoppingCart.php"; </script>';
    }
}

if (empty($FIO) || empty($eMail) || empty($numberUser) || empty($addressUser) || empty($indexUser) ||
    empty($methodDelivary) || empty($methodPay)) {

    exit(ordersForm::message('Заполните поля'));



}

if ($methodPay == "select") {
    exit(ordersForm::message('Выберите способ доставки'));

}
if ($methodPay == "select") {
    exit(ordersForm::message('Выберите способ оплаты.'));
}


if ($AddOr->num_rows > 0) {
    $id = 0;
    $stack = array();
    while ($row = $AddOr->fetch_assoc()) {
        $id++;

         $listOrdrs = 'Товар:' . $id . ': '   . $row["nameSmartCart"] . ' Количество:' . $row["quantitySmartCart"] . ' Цвет: ' . $row['colorSmartCart'] ;
        array_push($stack, $listOrdrs);


    }
}


$fulllistOrders = implode(", <br>  ", $stack);
$date = date("Y-m-d");
$addOrders = mysqli_query($link, 'INSERT INTO orders (idUsersOrders, listSmartOrders, priceSmartOrderes, 
 addressUsersOrders, indexUsersOrders, nubmerUsersOrders, eMailUsersOrders, methodDeliveryOrders, methodPayOrders, statusOrders, dateOrders)
 VALUES ("' . $idUser . '", "' . $fulllistOrders . '", "' . $fullSumPriceFormat . '", "' . $addressUser . '", "' . $indexUser . '", "' . $numberUser . '", 
 "' . $eMail . '", "' . $methodDelivary . '", "' . $methodPay . '", "' . $statusOrders . '", "' . $date . '")');


if($addressUser){
    $idUsersCart = $_COOKIE["idUser"];
    $QWE = mysqli_query($link, "DELETE FROM `shopingcart` WHERE `idUsersCart` = '$idUsersCart'");

    echo "
<script>alert('Вы успешно оформили заказ, ожидайте подтверждения!');</script>";

    echo "
<script type=\"text/javascript\">
window.location.href='../orders.php' </script> ";


}

?>
