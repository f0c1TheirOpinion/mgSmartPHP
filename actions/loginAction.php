<?php

include '../SQL.php';
if ( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
    //Пишем логин и пароль из формы в переменные (для удобства работы):
    $data = $_POST;
    $logincoo = $data['login'];
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $query = 'SELECT*FROM users WHERE loginUser="'.$login.'" AND password="'.$password.'"';
    $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result.
    $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
    if (!empty($user)) {

        $lg = $login;
        $getId = "select idUser,firstName from users where `loginUser`='$lg'";
        $result = mysqli_query($link, $getId);
        $row = mysqli_fetch_array($result);
        $id_users = $row['idUser'];
        $firstName = $row['firstName'];

        setcookie('name', 'bret');
            setcookie('login', $logincoo,time() + 60 * 60 * 24 * 365, "/");
            setcookie('idUser', $id_users,time() + 60 * 60 * 24 * 365, "/");
             setcookie('firstName', $firstName,time() + 60 * 60 * 24 * 365, "/");

             $time = time();

        $hash = md5($id_users . $time);


        $_SESSION['login123'] = $firstName;
        session_id($hash);
        session_start();

        header('Location: ../index.php');





    } else {
        echo "<script>alert(\"Вы ввели неверный логин или пароль!\");</script>";
        echo '<script> window.location.href="../login.php"</script>';
    }
}

?>
