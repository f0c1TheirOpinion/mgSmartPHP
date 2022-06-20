<?php if( $_COOKIE['loginAdmin']){ ?>
    <?php include "header.php"; ?>

    <table style="font-size: 16px" class="TableForAdmin" border="1px" cellspacing="0px">
        <tr><th>Номер<br>заказа</th><th>ID<br>заказчика</th><th>Дата заказа</th><th>Список товаров</th><th>Сумма заказа</th><th>Адрес</th><th>Индекс</th><th>Номер</th><th>Почта</th><th>Спсособ доставки</th>
            <th>Метод оплаты</th><th>Статус заказа</th> <th></th><th></th>   </tr>
        <?php
        $sql = "SELECT * FROM orders";
        $result = $link->query($sql);



        if ($result->num_rows > 0) {
            $id = 0;
            while ($row = $result->fetch_assoc()) {
                $id++;
                echo '<tr>
                           
                            <td>' . $row["idOrders"] . '</td>
                            <td>' . $row["idUsersOrders"] . '</td>
                             <td >' . $row["dateOrders"] . '</td>
                               <td nowrap>' . $row["listSmartOrders"] . '</td>
                            <td>' . $row["priceSmartOrderes"] . '</td>
                            <td>' . $row["addressUsersOrders"] . '</td>
                            <td>' . $row["indexUsersOrders"] . '</td>
                            <td>' . $row["nubmerUsersOrders"] . '</td>
                             <td>' . $row["eMailUsersOrders"] . '</td>
                            <td>' . $row["methodDeliveryOrders"] . '</td>
                             <td>' . $row["methodPayOrders"] . '</td>
                               <td>' . $row["statusOrders"] . '</td>
                           

                            <td><a href="ordersEdit.php?id=' . $row["idOrders"] . '"><i class="far fa-edit"></i></a></td>
                            <td><a href="ordersDelete.php?id=' . $row["idOrders"] . '"><i style="color: red; " class="fas fa-trash-alt"></i></a></td>

                            
                        </tr>
                    ';
            }

        }

        ?>
    </table>
<?php }else
    include "404.php";

?>


<?php ?>
