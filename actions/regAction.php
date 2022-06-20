<?php
include '../SQL.php';
class auth {

    // Создаем функцию для отображения сообщения и отправик пользователя.
    public static function message ($message = '') {
        return '<script> alert("'.$message.'"); location.href = "../reg.php"; </script>';

    }
}

// Читаем входные данные
$data = $_POST;
$firstName = $data['firstName'];
$lastName = $data['lastName'];
$loginUser = $data['loginUser'];
$eMail = $data['eMail'];
$password = $data['password'];
$rpass = $data['rpass'];

$numberUser = "Не указан";
$addressUser = "Не указан";
$indexUser = "Не указан";



if (empty($firstName) || empty($lastName) || empty($loginUser) ||  empty($eMail) || empty($password) || empty($rpass)) {
    exit(auth::message('Заполните поля'));
}

// Создадим подключение к бд.

if (!$link) {
    exit(auth::message('Ошибка соединения с базой данных: ' . $link->connect_error));
}

// Проверяем существует ли пользователь в бд.
$check = $link->query('SELECT * FROM users WHERE `loginUser` = "'.$loginUser.'"')->fetch_row();
if ($check == null) {

    if ($password != $rpass) {
        exit(auth::message('Пароли не совпадают повоторите попытку..'));
    }

    $link->query('INSERT INTO users SET `firstName` = "'.$firstName.'", `lastName` = "'.$lastName.'", `loginUser` = "'.$loginUser.'", `eMail` = "'.$eMail.'", `password` = "'.$password.'", `numberUser` = "'.$numberUser.'"
    , `addressUser` = "'.$addressUser.'", `indexUser` = "'.$indexUser.'"
		 ');
   echo '<script> alert("Вы успешно зарегистрировали аккаунт"); location.href = "../login.php"; </script>';



} else {
    exit(auth::message('Данный Логин уже занят'));
}

?>
