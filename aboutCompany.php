<?php include 'header.php'?>

<div class="aboutCompany">
    <h1>О компании</h1>
    <p>МГSMART — Главные производители смартфонов в РФ с 2021 года!
        В мире конвейерного производства высшей ценностью становятся уникальные вещи. Купить новинку раньше остальных — заявить о своем статусе и получить все преимущества инноваций. Если вы хотите выделяться из толпы, вам стоит следить за нашими анонсами в области мобильной электроники.
    </p>
    <h2>
        Что же дает технология 5G?
    </h2>
    <p>Ее главное преимущество — скорость подключения к интернету (более 1 Гбит/с). Представьте себе мгновенную загрузку файлов, плавное воспроизведение 4K-фильмов за пределами дома и стриминг мобильных игр без задержек.</p>
</div>
<div class="imageAb">
    <img src="image/aboutCom.jpg" alt="">
</div>
<div class="conacts">
    <div class="contactInformation">
        <?
        $sql = "SELECT * FROM `informationweb` WHERE `idinf`= 3";

$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM `informationweb` WHERE `idinf`= 2";
$result1 = mysqli_query($link, $sql);
$result1 = mysqli_fetch_assoc($result1);

        echo '
    <h1>Контактная информация</h1>
        <p>Адрес: пр. Автозаводцев, 43, Миасс, Челябинская обл., 456300 <br>
            Телефон: '.$result["textInf"].' <br>
            Почта: '.$result1["textInf"].' </p>
            ';
            ?>
    </div>

    <div class="map">
        <h2>Местоположение на карте</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2285.4487734143736!2d60.10595841606899!3d55.05287375322122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c53e3191a6fd7b%3A0xbf7d77b122b4dd9e!2z0JzQk9Cg0Jo!5e0!3m2!1sru!2sru!4v1618635585419!5m2!1sru!2sru" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php include 'footer.php'?>
