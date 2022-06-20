<?php

$host = 'localhost'; // адрес сервера
$database = 'mgsmart'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database);


/* проверка соединения */
if(!$link) {
    die('Соединение не удалось: Код ошибки: '.mysqli_connect_errno().' - '.mysqli_connect_error());
}

?>
