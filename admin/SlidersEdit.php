<?php
include "../SQL.php";
$id=$_GET['id'];


$sql = "SELECT * FROM `sliders` WHERE `idSlide`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);
$max_size=1000000;
$upload_dir='../image/slider/';
if(isset($_POST['save'])){

    if ( $_FILES['imageSlide']['error'] == 0 ) {
        if($_FILES['imageSlide']['size'] <= $max_size){
            $file_name=($_FILES['imageSlide']['name']);
            $type = substr($file_name, strpos($file_name, '.'), strlen($file_name)-1);
            $full_name= md5(uniqid()).$type;
            move_uploaded_file($_FILES['imageSlide']['tmp_name'],$upload_dir.$full_name);
            $dir = $upload_dir.$full_name;
        }
    }

    $headingSlide = $_POST['headingSlide'];
    $textSlide = $_POST['textSlide'];
    $nameButton = $_POST['nameButton'];
    $linkButton = $_POST['linkButton'];


    if(!$dir){
        $imageSlide = $result["imageSlide"];
    }else {
        $filename = $result["imageSlide"];
        unlink (''.$filename.'');
        $imageSlide = $dir;
    }

    $QWE = mysqli_query($link, "UPDATE `sliders` SET `imageSlide`='$imageSlide',`headingSlide`='$headingSlide',
`textSlide`='$textSlide', `nameButton`='$nameButton',`linkButton`='$linkButton'
 WHERE `idSlide`='$id'");
    if ($QWE) {
        header("LOCATION: ./SlidersTable.php");
    }
}
include "./header.php";

?>
<style>
    form{
        border: 1px solid Black;
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
    .fl{
        display: flex;
    }
    .tab{
        margin-left: 20px;
    }
    #status, #osn_cat{
        height: 25px;
        padding 5px
    }
</style>
<? echo '
<form method="post" enctype="multipart/form-data">
  
    <label for="save">Сохранить</label>
    <input type="submit" value="Сохранить" name="save" class="save" id="save">

    <p class="poyasni">Заголовок:</p>
    <input name="headingSlide" value="'.$result["headingSlide"].'" placeholder="Напишите название" id="im"><hr/><br/>

    <p class="poyasni">Текст слайда:</p>
    <input name="textSlide" value="'.$result["textSlide"].'" placeholder="Напишите описание" id="im"><hr/><br/>

    <p class="poyasni">Название кнопки:</p>
    <input name="nameButton" value="'.$result["nameButton"].'" placeholder="Напишите цвет" id="im"><hr/><br/>

    <p class="poyasni">Ссылка кнопки:</p>
    <input name="linkButton" value="'.$result["linkButton"].'" placeholder="Напишите диагональ" id="im"><hr/><br/>

   

    <p class="poyasni">Фон слайда:</p>
    <input type="file" name="imageSlide"><br/><br/>
 
</form>
 ' ?>
</body>
</html>
