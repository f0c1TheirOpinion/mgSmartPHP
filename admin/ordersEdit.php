<?php
include "../SQL.php";
$id=$_GET['id'];


$sql = "SELECT * FROM `orders` WHERE `idOrders`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);

if(isset($_POST['save'])){

    $statusOrders = $_POST['satusOrders'];




    $QWE = mysqli_query($link, "UPDATE `orders` SET `statusOrders`='$statusOrders'

 WHERE `idOrders`='$id'");
    if ($QWE) {
        header("LOCATION: ./ordersTable.php");
    }
}
include "./header.php";

?>
<style>
    form{

        padding: 20px;
        border-radius: 5px;
    }
    #im{
        width: 70%;
        padding: 5px;
        border: none;
    }
    #im:focus{
        width: 70%;
        padding: 5px;
    }
    #im:active, :hover, :focus {
        outline: 0;
        outline-offset: 0;
    }
    #opi, #harki{
        width: 100%;
        height: 400px;
        border-radius: 10px;
        padding: 10px;
        font-size: 25px;
    }
    .poyasni{
        font-size: 13px;
        margin: 0;
    }
    hr{
        margin: 0;
        padding: 0;
    }
    .save{
        visibility: hidden;
    }
    label{
        margin-left: 80%;
        position: fixed;
        background: #1f75fe;
        color: white;
        padding: 6px;
        font-size: 18px;
    }

</style>
<? echo '
<form method="post" enctype="multipart/form-data">
  
    <label for="save">Сохранить</label>
    <input type="submit" value="Сохранить" name="save" class="save" id="save">

    <p style="font-size: 17px;" class="poyasni">Статус заказа:</p>
                <select style="padding: 10px" name="satusOrders">
                <option value="select">Выберите стаус заказа </option>
                <option value="В обработке">В обработке</option>
                <option value="Отменен">Отменен</option>
                <option value="Отправлен">Отправлен</option>
                 <option value="Доставлен">Доставлен</option>
            </select>

   

 
</form>
 ' ?>
</body>
</html>
