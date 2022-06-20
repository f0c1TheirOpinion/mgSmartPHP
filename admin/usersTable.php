<?php if( $_COOKIE['loginAdmin']){ ?>
    <?php include "header.php"; ?>

    <table style="font-size: 16px" class="TableForAdmin" border="1px" cellspacing="0px">
        <tr><th>ID</th><th>Имя</th><th>Фамилия</th><th>Логин</th><th>Почта</th><th>Пароль</th><th>Номер телефона</th><th>Адрес</th><th>Индекс</th><th><a href="../reg.php"><i style="color: black;" class="fas fa-plus"></i></a></th><th></th>    </tr>
        <?php
        $sql = "SELECT * FROM users";
        $result = $link->query($sql);


        if ($result->num_rows > 0) {
            $id = 0;
            while($row = $result->fetch_assoc()) {
                $id++;
                echo '<tr>
                           
                            <td >'.$row["idUser"].'</td>
                            <td>'.$row["firstName"].'</td>
                            <td>'.$row["lastName"].'</td>
                            <td>'.$row["loginUser"].'</td>
                            <td>'.$row["eMail"].'</td>
                            <td>'.$row["password"].'</td>
                             <td>'.$row["numberUser"].'</td>
                            <td>'.$row["addressUser"].'</td>
                             <td>'.$row["indexUser"].'</td>
                           

                            <td><a href="usersEdit.php?id='.$row["idUser"].'"><i class="far fa-edit"></i></a></td>
                            <td><a href="usersDelete.php?id='.$row["idUser"].'"><i style="color: red; " class="fas fa-trash-alt"></i></a></td>

                            
                        </tr>
                    ';
            }
        }
        ?>
    </table>
<?php }else
    include "404.php";

?>

