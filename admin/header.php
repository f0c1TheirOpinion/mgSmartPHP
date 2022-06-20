<?php include "../SQL.php"?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../style/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
<header>
    <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" style="float:right;" id="navbar-toggle">
        <i class="fas fa-bars"></i>
    </button>
    <div class="logotype">
        <a href="#"><b>АдминПанель</b></a>
    </div>
    <nav class=" hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <ul class="">
            <li ><a class="active"  href="index.php">Главная</a></li>
            <li><a class="" href="smartTable.php">Смартфоны</a></li>
            <li><a href="usersTable.php">Пользователи</a></li>
            <li><a href="ordersTable.php">Заказы</a></li>
            <li><a href="SlidersTable.php">Слайдер</a></li>
            <li><a href="webSetTable.php">Настройки</a></li>
        </ul>
    </nav>
    <div style="float:right; position: relative; ">
        <ul>
            <li style="background: #ffffff; color: #0067b1; padding: 4px; border-radius: 5px; "><a href="logout.php">Выйти</a></li>
        </ul>
    </div>
</header>
