<?
if ($_COOKIE['loginAdmin']){
include '../SQL.php';
$id=$_GET['id'];

$sql = "SELECT * FROM smart WHERE `idSmart`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);

$filename = $result["imgSmart"];
unlink (''.$filename.'');
$QWE = mysqli_query($link, "DELETE FROM `smart` WHERE `idSmart` = '$id'");
if ($QWE) {
    header("LOCATION: ./smartTable.php");
}
}else
    include "404.php";
?>
