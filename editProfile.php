<?php
include "header.php";
$id = $_COOKIE['idUser'];
$sql = "SELECT * FROM `users` WHERE `idUser`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);
?>
<div style="margin: 50px 0 0 5px" class="profile">
    <div class="profileContent">
        <h1 style="position: absolute; color: white; font-size: 21px; font-weight: bold; padding: 24px 0 0 50px; z-index: 99;">Изменение данных пользователя</h1>
        <img style="width: 1000px; height: 79px" src="image/profilebg.jpg" alt="">
    </div>
</div>

<style>
    form{
        position: relative;
        padding: 0 60px 0 60px;
        border-radius: 10px;
        border: none;


    }

    #im{
        border-radius: 6px;
        font-size: 18px;
        width: 750px;
        padding: 5px;
        border: 1px solid #0067b1;

    }
    #im:focus{
        border-radius: 10px;
        padding: 6px;
    }
    #im:active, :hover, :focus {
        outline: 0;
        outline-offset: 0;
    }

    .poyasni{
        color: white;
        font-size: 17px;
        font-weight: 600;
        margin: 0;
    }

    .save{
        visibility: hidden;
    }
    label{
        right: 50px;
        position: fixed;
        background: #1f75fe;
        color: white;
        padding: 6px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
    }
    .buttonnz{
        font-weight: bold;
        text-align: center;
        display: block;
        width: 100px;
        height: 37px;
        font-size: 18px;
        padding: 6px;
        position: fixed;
        color: white;
        background: #b8b8b8;
        right: 50px;
        margin-top: 50px;
    }

</style>
<? echo '
<div style=" margin: 30px 0 30px 0; justify-content: center; align-content: center; display: flex;">
<div style="background: #031223;   border-radius: 10px;">
<form method="post" action="actions/editProfileAction.php" enctype="multipart/form-data">
  
    <label for="save">Сохранить</label>
    <a href="profile.php" class="buttonnz">Отмена</a>
    <input type="submit" value="Сохранить" name="save" class="save" id="save">
    

    <p class="poyasni">Имя:</p>
    <input name="firstName" value="' .$result["firstName"].'" placeholder="Напишите название" id="im"><br/><br>

    <p class="poyasni">Фамилия:</p>
    <input name="lastName" value="'.$result["lastName"].'" placeholder="Напишите описание" id="im"><br/><br>

    <p class="poyasni">Логин:</p>
    <input name="loginUser" value="'.$result["loginUser"].'" placeholder="Напишите цвет" id="im"><br/><br>
    
    <p class="poyasni">Почта:</p>
    <input name="eMail" value="'.$result["eMail"].'" placeholder="Напишите цвет" id="im"><br/><br>
    
    <p class="poyasni">Пароль:</p>
    <input name="password" value="'.$result["password"].'" placeholder="Напишите цвет" id="im"><br/><br>
    
     <p class="poyasni">Номер телефона:</p>
    <input name="numberUser" value="'.$result["numberUser"].'" placeholder="Напишите цвет" id="im"><br/><br>
    
     <p class="poyasni">Адрес:</p>
    <input name="addressUser" value="'.$result["addressUser"].'" placeholder="Напишите цвет" id="im"><br/><br>
    
     <p class="poyasni">Индекс:</p>
    <input name="indexUser" value="'.$result["indexUser"].'" placeholder="Напишите цвет" id="im"><br/><br>

</form>
</div>

 ' ?>

</div>
<?
include "footer.php";
?>
