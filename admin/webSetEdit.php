<?php
include "../SQL.php";
$id=$_GET['id'];


$sql = "SELECT * FROM `informationweb` WHERE `idInf`='$id'";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);
$max_size=1000000;
$upload_dir='../image/';
if(isset($_POST['save'])){

    if ( $_FILES['valuez']['error'] == 0 ) {
        if($_FILES['valuez']['size'] <= $max_size){
            $file_name=($_FILES['valuez']['name']);
            $type = substr($file_name, strpos($file_name, '.'), strlen($file_name)-1);
            $full_name= md5(uniqid()).$type;
            move_uploaded_file($_FILES['valuez']['tmp_name'],$upload_dir.$full_name);
            $dir = $upload_dir.$full_name;
        }
    }

    $nameinf = $_POST['nameInf'];
    $valuez = $_POST['valuez'];

if($id == 4) {
    if (!$dir) {
        $valuez = $result["textInf"];
    } else {
        $filename = $result["textInf"];
        unlink('' . $filename . '');
        $valuez = $dir;
    }
}

    $QWE = mysqli_query($link, "UPDATE `informationweb` SET
`textInf`='$valuez' WHERE `idInf`='$id'");
    if ($QWE) {
        header("LOCATION: ./webSetTable.php");
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
        font-size: 17px;
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
<?
echo '
<form method="post" enctype="multipart/form-data">
  
    <label for="save">Сохранить</label>
    <input type="submit" value="Сохранить" name="save" class="save" id="save">';

if($id != 4) {
    echo '

    <p class="poyasni">' . $result["nameInf"] . '</p>
    ';
    if($id == 5){
    echo '<select style="padding: 10px" name="valuez">
                <option value="₽">Выберите валюту </option>
                <option value="₽">₽</option>
                <option value="€">€</option>
                <option value="$">$</option>
            </select>';
    }else{
        echo '
        <input name="valuez" value="' . $result["textInf"] . '" placeholder="Напишите описание" id="im"><hr/><br/>';
    }

}else{
echo '
    <p class="poyasni">Иконка:</p>
    <input type="file" name="valuez"><br/><br/>
 ';} ?>
</form>

</body>
</html>
