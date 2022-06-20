<?php
include "../SQL.php";
$id=$_GET['id'];


$sql = "SELECT * FROM `users` WHERE `idUser`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);

if(isset($_POST['save'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $loginUser = $_POST['loginUser'];
    $eMail = $_POST['eMail'];
    $password = $_POST['password'];
    $numberUser = $_POST['numberUser'];
    $addressUser = $_POST['addressUser'];
    $indexUser = $_POST['indexUser'];




    $QWE = mysqli_query($link, "UPDATE `users` SET `firstName`='$firstName',
`lastName`='$lastName',`loginUser`='$loginUser',`eMail`='$eMail',`password`='$password',`numberUser`='$numberUser'
 ,`addressUser`='$addressUser',`indexUser`='$indexUser'
 WHERE `idUser`='$id'");
    if ($QWE) {
        header("LOCATION: ./usersTable.php");
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

    <p class="poyasni">Имя:</p>
    <input name="firstName" value="'.$result["firstName"].'" placeholder="Напишите название" id="im"><hr/><br/>

    <p class="poyasni">Фамилия:</p>
    <input name="lastName" value="'.$result["lastName"].'" placeholder="Напишите описание" id="im"><hr/><br/>

    <p class="poyasni">Логин:</p>
    <input name="loginUser" value="'.$result["loginUser"].'" placeholder="Напишите цвет" id="im"><hr/><br/>
    
    <p class="poyasni">Почта:</p>
    <input name="eMail" value="'.$result["eMail"].'" placeholder="Напишите цвет" id="im"><hr/><br/>
    
    <p class="poyasni">Пароль:</p>
    <input name="password" value="'.$result["password"].'" placeholder="Напишите цвет" id="im"><hr/><br/>
    
     <p class="poyasni">Номер телефона:</p>
    <input name="numberUser" value="'.$result["numberUser"].'" placeholder="Напишите цвет" id="im"><hr/><br/>
    
     <p class="poyasni">Адрес:</p>
    <input name="addressUser" value="'.$result["addressUser"].'" placeholder="Напишите цвет" id="im"><hr/><br/>
    
     <p class="poyasni">Индекс:</p>
    <input name="indexUser" value="'.$result["indexUser"].'" placeholder="Напишите цвет" id="im"><hr/><br/>

 
</form>
 ' ?>
</body>
</html>
