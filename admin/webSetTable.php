<?php if( $_COOKIE['loginAdmin']){ ?>
    <?php include "header.php"; ?>

    <table style=" text-align: left; font-size: 16px" class="TableForAdmin" border="1px" cellspacing="0px">
        <tr><th>ID</th><th>Название</th><th>Значение</th></th><th></th>    </tr>
        
        <?php
        $sql = "SELECT * FROM informationweb";
        $result = $link->query($sql);
        
        if ($result->num_rows > 0) {
            $id = 0;
            while($row = $result->fetch_assoc()) {
                $id++;
                echo '<tr>
                           
                            <td >'.$row["idInf"].'</td>
                            ';

                echo '
                            <td>'.$row["nameInf"].'</td>';

                if($id != 4) {
                    echo '   <td > '.$row["textInf"].'</td>';
                }else{
                    echo '<td><img style="width: 40px; height: 40px;" src="'.$row["textInf"].'" /></td>';
                }

                echo '
                       
                           

                            <td><a href="webSetEdit.php?id='.$row["idInf"].'"><i class="far fa-edit"></i></a></td>

                            
                        </tr>
                    ';
            }
        }
        ?>
    </table>
<?php }else
    include "404.php";

?>

