<?php include "header.php"?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-3" >
    <?php
    $sql = "SELECT * FROM smart";
    $result = $link->query($sql);

    $sql = "SELECT * FROM `informationweb` WHERE `idinf`= 5";
    $result1 = mysqli_query($link, $sql);
    $result1= mysqli_fetch_assoc($result1);

    if ($result->num_rows > 0) {
        $id = 0;
        while($row = $result->fetch_assoc()) {
            $id++;

            echo '   <div class="smarth md:p-8 p-2 bg-white">

        <img style=" height: 340px; width: 330px"
             class="rounded-lg "
             src="'.$row["imgSmart"].'"
        />
        <br>

        <h1
            class=" font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate">
            '.$row["nameSmart"].'
        </h1>
        <div style="height: 90px" class="max-w-full">
            <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
            '.$row["descriptionSmart"].'
            </p>
        </div>
        <br>
        <div class="characteristics">
            <h2>Характеристики:</h2>
            <h3>Цвет: '.$row["colorSmart"].' </h3>
            <h3>Дисплей: '.$row["displaySmart"].' </h3>
            <h3>Процессор: '.$row["cpuSmart"].' </h3>
            <h3>Видео процессор: '.$row["gpuSmart"].' </h3>
            <h3>Встроенная память: '.$row["memorySmart"].' ГБ </h3>
            <h3>Оперативная память: '.$row["ramSmart"].' ГБ</h3>
        </div>
        <br>
        <div class="pricebuy">
            <h1>Цена: '.$row["priceSmart"].' '.$result1["textInf"].'</h1>
            <a  href="actions/shopingCartAction.php?id='.$row["idSmart"].'"><i class="fa fa-cart-plus"></i></a>
           
        </div>
    </div>
                    ';
        }
    }

    ?>



</div>

<?php include "footer.php"?>
