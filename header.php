<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../style/tailwind.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="/image/lgico.ico" type="image/x-icon">

</head>
<body>
<? include "SQL.php"?>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<header>

    <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" style="float:right;" id="navbar-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="logotype">
        <?
        $sql = "SELECT * FROM `informationweb` WHERE `idinf`= 1";

$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);
echo '
        <a href="#"><b>'.$result["textInf"].'</b></a>
        ';?>
    </div>
    <nav class=" hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <ul class="">
            <li ><a class="active"  href="index">Главная</a></li>
            <li><a class="" href="aboutCompany">О Компании</a></li>
            <li><a href="workers">Сотрудники</a></li>
            <li><a href="smart">Смартфоны</a></li>
            <li><a href=""></a></li>
        </ul>
    </nav>

    <div class="auth">
        <ul>
           <?
           if(!$_COOKIE['login']){ ?>

            <li><a href="login">Войти</a></li>
            <li><a href="reg">Регистрация</a></li>

              <? }else
        echo '
              
 <div style="z-index: 100; " @click.away="open = false" class="relative" x-data="{ open: false }">
        <button  style="font-size: 16px; " @click="open = !open" class="buttonName flex flex-row items-center w-full px-4  text-sm font-semibold text-left 0 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 ">
          <span style="font-weight: bold;" >'.$_COOKIE['firstName']. '</span>
          <svg  fill="currentColor" viewBox="0 0 20 20" :class="{\'rotate-180\': open, \'rotate-0\': !open}" class="inline w-6 h-6  transition-transform  transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
        <div style="" x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
          <div style="color: black" class="px-2 py-2 bg-white rounded-md shadow ">
            <a class="dritem block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent " href="profile">Мой профиль</a>
            <a class=" dritem block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent " href="orders">Мои заказы</a>
            <a class=" dritem block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent " href="actions/logoutAction.php">Выйти</a>
          </div>
        </div>
        </div>

        </ul>
    </div>

    <div class="shopc">
        <a href="shoppingCart"><i class="fas fa-shopping-cart"></i>
        </a>
        ';
          $idUser =  $_COOKIE["idUser"];
                $sql = "SELECT * FROM shopingcart WHERE `idUsersCart` = $idUser ";
                $result = $link->query($sql);
                $eqlproducts = 0;
                if ($result->num_rows > 0) {
                while ($row1 = $result->fetch_assoc()) {
                    $eqlproducts++;
                }
                }

                if($result->num_rows > 0) {
                    echo '
          <p class="qual">' . $eqlproducts . '</p> ';
                }
            ?>


    </div>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
</header>




