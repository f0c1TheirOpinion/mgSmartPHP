<?php if( $_COOKIE['loginAdmin']){ ?>
    <?php include "header.php"; ?>

    <table class="TableForAdmin" border="1px" cellspacing="0px">
        <tr><th>ID</th><th>Заголовок</th><th>Текст</th><th>Название кнопки</th><th>Ссылка кнопки</th><th>Фон слайда</th></th><th></th>    </tr>
        <?php
        $sql = "SELECT * FROM sliders";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            $id = 0;
            while($row = $result->fetch_assoc()) {
                $id++;
                echo '<tr>
                           
                            <td >'.$row["idSlide"].'</td>
                            <td>'.$row["headingSlide"].'</td>
                            <td>'.$row["textSlide"].'</td>
                            <td>'.$row["nameButton"].'</td>
                              <td>'.$row["linkButton"].'</td>
                       
                              <td><img src="'.$row["imageSlide"].'" width="360px" height="400px"></td>

                            <td><a href="SlidersEdit.php?id='.$row["idSlide"].'"><i class="far fa-edit"></i></a></td>

                            
                        </tr>
                    ';
            }
        }
        ?>
    </table>
<?php }else
    include "404.php";

?>

