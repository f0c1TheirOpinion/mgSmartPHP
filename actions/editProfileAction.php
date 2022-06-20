<?php

include "../SQL.php";
$id = $_COOKIE['idUser'];


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
        setcookie('login', $loginUser,time() + 60 * 60 * 24 * 365, "/");
        setcookie('firstName', $firstName,time() + 60 * 60 * 24 * 365, "/");
        header("LOCATION: ../Profile.php");
    }
}

?>
