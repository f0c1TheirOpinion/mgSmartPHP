<?php
include "header.php";
?>
<div class="container mx-auto mt-10">
    <div class="flex shadow-md my-10">
        <div class="w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Корзина товаров</h1>
                <?
                $idUser =  $_COOKIE["idUser"];
                $sql = "SELECT * FROM shopingcart WHERE `idUsersCart` = $idUser ";
                $resultTovars = $link->query($sql);
                $result = $link->query($sql);
                $eqlproducts = 0;
                if ($resultTovars->num_rows > 0) {

                while ($row1 = $resultTovars->fetch_assoc()) {
                    $eqlproducts++;
                }
                }

                 echo '<h2 class="font-semibold text-2xl">Товаров: '.$eqlproducts. ' </h2>'; ?>
            </div>
            <?
            if($resultTovars->num_rows > 0) {
                echo '
            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-s uppercase w-2/5">Название товара</h3>
                <h3 class="font-semibold text-center text-gray-600 text-s uppercase w-1/5 text-center">Количество</h3>
                <h3 class="font-semibold text-center text-gray-600 text-s uppercase w-1/5 text-center">Цена</h3>
                <h3 class="font-semibold text-center text-gray-600 text-s uppercase w-1/5 text-center">Общая цена</h3>
            </div>
            ';
            }else{
                echo '<h1 style="margin: 0 0 400px;" class="text-xl" >В вашей корзине пусто?<br>
                    Это не страшно!</h1>';
            }
             ?>
            <?


 if ($result->num_rows > 0) {
     $id = 0;
     while ($row = $result->fetch_assoc()) {
         $id++;
         $price = str_replace(" ", '', $row["priceSmartCart"]);
         $sumprice = $price * $row["quantitySmartCart"];
         $fullSumPrice += $sumprice;

         $fullSumPriceFormat = number_format($fullSumPrice, 0, ',', ' ');
         $sumpriceFormat = number_format($sumprice, 0, ',', ' ');

         echo '
         <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5" >
                <div class="flex w-2/5" > <!--product -->
                    <div class="w-20" >
                        <img class="h-24" src = "'.$row["imgSmartCart"].'" alt = "" >
                    </div >
                    <div class="flex flex-col justify-between ml-4 flex-grow" >
                        <span class="font-bold text-s" > '.$row["nameSmartCart"].' </span >
                        <span class="text-s" >'.$row["colorSmartCart"].'</span >

                        <a href = "actions/clearIDCartAction.php?idshopingcart='.$row["idshopingcart"].'" class=" text-red-700  hover:text-red-500 text-gray-500 text-s" >Удалить</a >
                    </div >
                </div >
                <div style="cursor: pointer;" class="flex justify-center w-1/5" >
               
                    <a class="" href="actions/plusMinusQuanAction.php?idshopingcart='.$row["idshopingcart"].'&plusMinus=minus&quantity='.$row["quantitySmartCart"].'"><i class="fas fa-minus"></i></a>

                    <input style="cursor: default;" class="mx-2 border text-center w-8" type = "text" value = "'.$row["quantitySmartCart"].'" readonly >
                    <a class="" href="actions/plusMinusQuanAction.php?idshopingcart='.$row["idshopingcart"].'&plusMinus=plus&quantity='.$row["quantitySmartCart"].'"><i class="fas fa-plus"></i></a>
                 
                </div >
                <span class="text-center w-1/5 font-semibold text-sl" > '.$row["priceSmartCart"].' ₽ </span >
                '?>
                <?
         echo '
                <span class="text-center w-1/5 font-semibold text-sl" > '.$sumpriceFormat.' ₽ </span >
            </div >
            ';
            }
 }

?>
            <?
            if ($result->num_rows > 0) {
                echo '
            <a class="clearCart" href="actions/clearCartAction.php">Очистить корзину</a>';
            }
            ?>
            <a href="smart.php" class="flex font-semibold text-indigo-600 text-s mt-10">

                <svg class="fill-current mr-2 text-indigo-600 w-4 text-xl" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                Вернуться к покупкам
            </a>
        </div>

<?
if ($result->num_rows > 0) {

echo '
        <div id="summary" class="w-1/2 px-8 py-10">
            <h1 class="font-semibold text-2xl border-b pb-8">Оформление заказа</h1>';
$idCookieUser = $_COOKIE['idUser'];
$sql = "SELECT * FROM users WHERE `idUser` = '$idCookieUser'";
$result = $link->query($sql);
$result = mysqli_fetch_assoc($result);
echo '
            <form class="addOrders" action="actions/newOrdersAction.php" method="post">

                <p>ФИО:</p>
                <input name="FIO" value="'.$result["firstName"].' '.$result["lastName"].'" placeholder="Напишите название" id="im"></p>
                 
                  <p>Почта:</p>
                <input name="eMail" value="'.$result["eMail"].'" placeholder="Напишите название" id="im"></p>
                
                <p>Телефон:</p>
                <input name="numberUser" value="'.$result["numberUser"].'" placeholder="Напишите название" id="im"></p>
                
                   <p>Адрес:</p>
                <input name="addressUser" value="'.$result["addressUser"].'" placeholder="Напишите название" id="im"></p>

                 <p>Индекс:</p>
                  <input name="indexUser" value="'.$result["indexUser"].'" placeholder="Напишите название" id="im"></p>
                  
                  <input style="display: none;" name="fullSumPriceFormat" value="'.$fullSumPriceFormat.'">
               
                <p>Компания доставки:</p>
                <select name="methodDelivary">
                <option value="select">Выберите компанию доставки</option>
                <option value="СДЭК">СДЭК</option>
                <option value="Почта России">Почта России</option>
                 <option value="DPD">DPD</option>
                  <option value="Boxberry">Boxberry</option>
            </select>
            
            <p>Способ оплаты:</p>
                <select name="methodPay">
                <option value="select">Выберите способ оплаты </option>
                <option value="Visa или MasterCard">Карта Visa или MasterCard (Maestro)</option>
                <option value="Почтовый перевод">Почтовый перевод</option>
                 <option value="Яндекс.Деньги">Яндекс.Деньги</option>
                  <option value="По квитанции">По квитанции через банк</option>
            </select>
            
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Сумма заказа</span>
                  <span style="font-size: 18px;">'.$fullSumPriceFormat.' ₽</span> 
                </div>
                <button class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-sm text-white uppercase w-full">Оформить заказ</button>
            </div>
    </form>
        </div> '; }

?>


    </div>
</div>
<?php
include "footer.php";
?>
