<?php
include "../header.php";
if ($_COOKIE['login']){
    include "../SQL.php";
    $id=$_GET['id'];
    $idUsersCart = $_COOKIE["idUser"];
    $shopingCart = "SELECT * FROM `shopingcart` WHERE `idUsersCart`= $idUsersCart";
    $shopingCartResult = $link->query($shopingCart);
    echo '';
    $addProductIf = true;

  if ($shopingCartResult->num_rows > 0) {
      $idCart = 0;
      while ($row = $shopingCartResult->fetch_assoc()) {
          $idCart++;
          if($id == $row["idSmartCart"]){
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
      $sql = "SELECT * FROM `smart` WHERE `idSmart`='$id'";
      $result = mysqli_query($link, $sql);
      $result = mysqli_fetch_assoc($result);
      $addProduct = mysqli_query($link, 'INSERT INTO shopingcart (idUsersCart, idSmartCart, nameSmartCart, priceSmartCart, imgSmartCart, 
quantitySmartCart, colorSmartCart)
 VALUES ("' . $_COOKIE['idUser'] . '", "' . $result["idSmart"] . '", "' . $result["nameSmart"] . '", "' . $result["priceSmart"] . '"
            ,"' . $result["imgSmart"] . '", 1, "' . $result["colorSmart"] . '")');

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
