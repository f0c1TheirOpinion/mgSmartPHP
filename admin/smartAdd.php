<?php
if ($_COOKIE['loginAdmin']){
include "../SQL.php";
$sql = "SELECT * FROM `smart`";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);
$max_size=1000000;
$upload_dir='../image/smart/';
if(isset($_POST['save'])){

    if ( $_FILES['imgSmart']['error'] == 0 ) {
        if($_FILES['imgSmart']['size'] <= $max_size){
            $file_name=($_FILES['imgSmart']['name']);
            $type = substr($file_name, strpos($file_name, '.'), strlen($file_name)-1);
            $full_name= md5(uniqid()).$type;
            move_uploaded_file($_FILES['imgSmart']['tmp_name'],$upload_dir.$full_name);
            $dir = $upload_dir.$full_name;
        }
    }

    $nameSmart = $_POST['nameSmart'];
    $descriptionSmart = $_POST['descriptionSmart'];
    $colorSmart = $_POST['colorSmart'];
    $displaySmart = $_POST['displaySmart'];
    $cpuSmart = $_POST['cpuSmart'];
    $gpuSmart = $_POST['gpuSmart'];
    $memorySmart = $_POST['memorySmart'];
    $ramSmart = $_POST['ramSmart'];
    $priceSmart = $_POST['priceSmart'];
    $imgSmart = $dir;
    $QWE = mysqli_query($link, 'INSERT INTO smart (nameSmart, descriptionSmart, colorSmart, displaySmart, 
cpuSmart, gpuSmart, memorySmart, ramSmart, priceSmart, imgSmart )
 VALUES ("'.$nameSmart.'", "'.$descriptionSmart.'", "'.$colorSmart.'", "'.$displaySmart.'", "'.$cpuSmart.'", "'.$gpuSmart.'",
  "'.$memorySmart.'", "'.$ramSmart.'", "'.$priceSmart.'", "'.$imgSmart.'")');
    if ($QWE) {
        header("LOCATION: ./smartTable.php");
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
            font-size: 15px;
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
<form method="post" enctype="multipart/form-data">
    <label for="save">Сохранить</label>
    <input type="submit" value="Сохранить" name="save" class="save" id="save">

    <p class="poyasni">Название:</p>
    <input name="nameSmart" placeholder="Напишите название" id="im"><hr/><br/>

    <p class="poyasni">Описание:</p>
    <input name="descriptionSmart" placeholder="Напишите описание" id="im"><hr/><br/>

    <p class="poyasni">Цвет:</p>
    <input name="colorSmart" placeholder="Напишите цвет" id="im"><hr/><br/>

    <p class="poyasni">Диагональ:</p>
    <input name="displaySmart" placeholder="Напишите диагональ" id="im"><hr/><br/>

    <p class="poyasni">Процессор:</p>
    <input name="cpuSmart" placeholder="Напишите процессор" id="im"><hr/><br/>

    <p class="poyasni">Видеопроцессор:</p>
    <input name="gpuSmart" placeholder="Напишите видеопроцессор" id="im"><hr/><br/>

    <p class="poyasni">Встроенная память:</p>
    <input name="memorySmart" placeholder="Напишите кол-во памяти" id="im"><hr/><br/>

    <p class="poyasni">Оперативная память:</p>
    <input name="ramSmart" placeholder="Напишите кол-во памяти" id="im"><hr/><br/>

    <p class="poyasni">Цена:</p>
    <input name="priceSmart" placeholder="Напишите кол-во памяти" id="im"><hr/><br/>


    <p class="poyasni">Изображение:</p>
    <input type="file" name="imgSmart"><br/><br/>
</form>
<?php }else
    include "404.php";
?>
</body>
</html>
