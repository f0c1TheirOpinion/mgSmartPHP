<?php
include "header.php";
$idUser =  $_COOKIE["idUser"];
$sql = "SELECT * FROM orders WHERE `idUsersOrders` = $idUser ";
$result = $link->query($sql);
$sql1 = "SELECT * FROM `informationweb` WHERE `idinf`= 5";
$result1 = mysqli_query($link, $sql1);
$result1= mysqli_fetch_assoc($result1);
?>
<?php if ($result->num_rows > 0) {
    echo '
    <table style = " text-align:left;font-size: 18px; margin: 0 0  450px 0" class="TableForAdmin" border = "1px" cellspacing = "0px" >
    <h1 style = "text-align: center; font-size: 20px; margin: 20px 0 20px 0 " > Мои заказы </h1 >
    <tr ><th > Номер заказа </th ><th>Дата заказа </th ><th > Список позиций заказа </th > ><th >Сумма заказа</th ><th > Адрес</th ><th > Номер телефона </th ><th > Метод оплаты:</th ><th > Способ доставки:</th ><th > Cтатус</th >    </tr >
  ';}else{
    echo '<h1 style="font-size: 25px; text-align: center; margin: 60px 0 800px 0">У вас нет заказов, но это можно исправить</h1>';
}
   ?>
    <?php
    $sql = "SELECT * FROM orders WHERE `idUsersOrders` = $idUser ";
    $result = $link->query($sql);


    if ($result->num_rows > 0) {
        $id = 0;
        while($row = $result->fetch_assoc()) {
            $id++;
            echo '<tr>
                           
                            <td >'.$row["idOrders"].'</td>
                             <td >'.$row["dateOrders"].'</td>
                            <td nowrap>'.$row["listSmartOrders"].'</td>
                        
                            <td>'.$row["priceSmartOrderes"] .' '. $result1["textInf"] . '</td>
                                   <td>'.$row["addressUsersOrders"].'</td>
                             <td>'.$row["nubmerUsersOrders"].'</td>
                             <td>'.$row["methodPayOrders"].'</td>
                            <td>'.$row["methodDeliveryOrders"]. '</td>
                             <td style="background: #61fabc;">' .$row["statusOrders"].'</td>
                           
                            
                        </tr>
                    ';
        }
    }
    ?>
</table>


<?php include "footer.php";?>
