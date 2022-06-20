<?php
include "header.php";
$idCookieUser = $_COOKIE['idUser'];
$sql = "SELECT * FROM users WHERE `idUser` = '$idCookieUser'";
$result = $link->query($sql);
$result = mysqli_fetch_assoc($result);
?>
<div class="profile">
    <div class="profileContent">
        <div class="editUserInformation">
            <a href="editProfile"><i class="fas fa-user-edit"></i></a>
        </div>
        <div class="userInformation">
<h1>Мой профиль</h1>

            <?
            echo '
   <h3><h2>'.$result["firstName"].'</h2>  <b>Имя:</b> </h3>
    <h3><h2>'.$result["lastName"].'</h2> <b>Фамилия:</b>  </h3>
    <h3><h2>'.$result["loginUser"].'</h2> <b>Логин:</b>  </h3>
    <h3><h2>'.$result["eMail"].'</h2> <b>Почта:</b>  </h3>
    <h3><h2>'.$result["numberUser"].'</h2> <b>Номер телефона:</b>  </h3>
    <h3><h2>'.$result["addressUser"].'</h2> <b>Адрес:</b>  </h3>
    <h3><h2>'.$result["indexUser"].'</h2> <b>Индекс:</b> </h3>
';
?>
        </div>
    <img src="image/profilebg.jpg" alt="">

    </div>
</div>
<?php
include "footer.php";
?>
