<?php
include "../header.php";
if ($_COOKIE['login']){
    include "../SQL.php";
    $id=$_GET['id'];
    $idUsersCard = $_COOKIE["idUser"];
    $shopingCard = "SELECT * FROM `shopingcard` WHERE `idUsersCard`= $idUsersCard";
    $shopingCardResult = $link->query($shopingCard);
    echo '';
    $addProductIf = true;

  if ($shopingCardResult->num_rows > 0) {
      $idCart = 0;
      while ($row = $shopingCardResult->fetch_assoc()) {
          $idCart++;
          if($id == $row["idSmartCard"]){
              echo '<script type="text/javascript"> swal("Товар уже добавлен") </script>';
              echo "<script>
 function redr(){
     window.location.href='../smart.php';
 }
 setTimeout(redr, 500); </script>";
              $addProductIf = false;
              return;
          }
      }
  }
  if($addProductIf) {
      $sql = "SELECT * FROM `bitovyxa` WHERE `idBAV`='$id'";
      $result = mysqli_query($link, $sql);
      $result = mysqli_fetch_assoc($result);
      $addProduct = mysqli_query($link, 'INSERT INTO shopingcard (idUsersCard, idSmartCard, nameSmartCard, priceSmartCard, imgSmartCard, 
quantitySmartCard, colorSmartCard)
 VALUES ("' . $_COOKIE['idUser'] . '", "' . $result["idBAV"] . '", "' . $result["nameBAV"] . '", "' . $result["priceBAV"] . '"
            ,"' . $result["imgBAV"] . '", 1, "' . $result["colorBAV"] . '")');

          echo '<script type="text/javascript"> swal("Товар успешно добавлен в корзину") </script>';
          echo "<script>
 function redr(){
     window.location.href='../smart.php';
 }
 setTimeout(redr, 500); </script>";
      }






}else{

    echo '<script type="text/javascript"> swal("Вы неавторизованный пользователь","Авторизируйтесь перед добавлением товара!") 
 function redr1(){
     window.location.href=\'../login.php\';
 }
 setTimeout(redr1, 2500); </script>";
              

</script>';

}
?>
