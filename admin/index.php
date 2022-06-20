<?php if( $_COOKIE['loginAdmin']){ ?>
<?php include "header.php";
     $sql = "SELECT * FROM orders";
        $result = $link->query($sql);

           if ($result->num_rows > 0) {
               $idOrders = 0;
               while ($row = $result->fetch_assoc()) {
                   $idOrders++;
               }
           }




    $sql1 = "SELECT * FROM orders WHERE `statusOrders` = 'Доставлен' ";

    $result1 = $link->query($sql1);

    if ($result1->num_rows > 0) {
        $idSells = 0;
        while ($row1 = $result1->fetch_assoc()) {
            $idSells++;
        }
    }

    $sql2 = "SELECT * FROM users ";

    $result2 = $link->query($sql2);

    if ($result2->num_rows > 0) {
        $idUsers = 0;
        while ($row2 = $result2->fetch_assoc()) {
            $idUsers++;
        }
    }



echo '   
<div class="stat">
<div class="  flex flex-col justify-center ">
  <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-4 px-4">
    <!-- SMALL CARD ROUNDED -->
    <div style="border-radius: 10px;" class="bg-gray-100 border-indigo-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid  border-2 | flex justify-around  ">
      <div style="text-align: left;" class="flex flex-col">
        <p class="text-gray-900 dark:text-gray-300 font-semibold">Количество заказов</p>
        <p style="text-align: center;" class="text-black dark:text-gray-100  font-semibold">'.$idOrders.'</p>
      </div>
    </div>
 <div style="border-radius: 10px;" class="bg-gray-100 border-indigo-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid  border-2 | flex justify-around cursor-pointer ">
      <div class="flex flex-col justify-center">
         <p class="text-gray-900 dark:text-gray-300 font-semibold">Количество продаж</p>
        <p style="text-align: center;" class="text-black dark:text-gray-100  font-semibold">'.$idSells.'</p>
      </div>
    </div>
    
     <div style="border-radius: 10px;" class="bg-gray-100 border-indigo-600 dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-2 border-solid  border-2 | flex justify-around cursor-pointer ">
      <div class="flex flex-col justify-center">
         <p class="text-gray-900 dark:text-gray-300 font-semibold">Количество пользоватлей</p>
        <p style="text-align: center;" class="text-black dark:text-gray-100  font-semibold">'.$idUsers.'</p>
      </div>
    </div>
 
  </div>
</div> 
</div>


';?>
<div class="lastOrders">
    <h2>Последние заказы:</h2>
    <table style="font-size: 16px" class="TableForAdmin" border="1px" cellspacing="0px">
        <tr><th>Номер<br>заказа</th><th>ID<br>заказчика</th><th>Дата заказа</th><th>Список товаров</th><th>Сумма заказа</th><th>Адрес</th><th>Индекс</th><th>Номер</th><th>Почта</th><th>Спсособ доставки</th>
            <th>Метод оплаты</th><th>Статус заказа</th> <th></th><th></th>   </tr>
        <?php
        $sql = "SELECT * FROM orders";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            $id = 0;
            while($row = $result->fetch_assoc()) {
                $id++;
                if($id >= 4 ){
                    break;
                }
                echo '<tr>
                           
                            <td>'.$row["idOrders"].'</td>
                            <td>'.$row["idUsersOrders"].'</td>
                             <td >'.$row["dateOrders"].'</td>
                               <td nowrap>'.$row["listSmartOrders"].'</td>
                            <td>'.$row["priceSmartOrderes"].'</td>
                            <td>'.$row["addressUsersOrders"].'</td>
                            <td>'.$row["indexUsersOrders"].'</td>
                            <td>'.$row["nubmerUsersOrders"].'</td>
                             <td>'.$row["eMailUsersOrders"].'</td>
                            <td>'.$row["methodDeliveryOrders"].'</td>
                             <td>'.$row["methodPayOrders"].'</td>
                               <td>'.$row["statusOrders"].'</td>
                           

                            <td><a href="ordersEdit.php?id='.$row["idOrders"].'"><i class="far fa-edit"></i></a></td>
                            <td><a href="ordersDelete.php?id='.$row["idOrders"].'"><i style="color: red; " class="fas fa-trash-alt"></i></a></td>

                            
                        </tr>
                    ';
            }
        }

        ?>
    </table>
</div>
<?php include "footer.php"?>
<?php }else
include "404.php";

    ?>
