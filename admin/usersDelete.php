<?
if ($_COOKIE['loginAdmin']){
    include '../SQL.php';
    $id=$_GET['id'];

    $sql = "SELECT * FROM users WHERE `idUser`='$id'";
    $result = mysqli_query($link, $sql);
    $result = mysqli_fetch_assoc($result);


    $QWE = mysqli_query($link, "DELETE FROM `users` WHERE `idUser` = '$id'");
    if ($QWE) {
        header("LOCATION: ./usersTable.php");
    }
}else
    include "404.php";
?>
