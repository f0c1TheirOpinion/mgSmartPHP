<?php if( $_COOKIE['loginAdmin']){ ?>
<?php include "header.php"; ?>

<table class="TableForAdmin" border="1px" cellspacing="0px">
    <tr><th>ID</th><th>Название</th><th>Описаение</th><th>Цвет</th><th>Диагональ</th><th>Процессор</th><th>Видеопроцессор</th>
        <th>Встроенная память</th><th>Оперативная память</th><th>Цена</th><th>Изображение</th><th><a href="smartAdd.php"><i style="color: black;" class="fas fa-plus"></i></a></th><th></th>    </tr>
    <?php
    $sql = "SELECT * FROM smart";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $id = 0;
        while($row = $result->fetch_assoc()) {
            $id++;
            echo '<tr>
                           
                            <td >'.$row["idSmart"].'</td>
                            <td>'.$row["nameSmart"].'</td>
                            <td>'.$row["descriptionSmart"].'</td>
                            <td>'.$row["colorSmart"].'</td>
                             <td>'.$row["displaySmart"].'</td>
                             <td>'.$row["cpuSmart"].'</td>
                             <td>'.$row["gpuSmart"].'</td>
                               <td>'.$row["memorySmart"].'</td>
                               <td>'.$row["ramSmart"].'</td>
                                <td>'.$row["priceSmart"].'</td>
                              <td><img src="'.$row["imgSmart"].'" width="90px" height="120px"></td>

                            <td><a href="smartEdit.php?id='.$row["idSmart"].'"><i class="far fa-edit"></i></a></td>
                            <td><a href="smartDelete.php?id='.$row["idSmart"].'"><i style="color: red; " class="fas fa-trash-alt"></i></a></td>

                            
                        </tr>
                    ';
        }
    }
    ?>
</table>
<?php }else
    include "404.php";

?>

