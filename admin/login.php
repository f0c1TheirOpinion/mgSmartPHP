<?php
include '../SQL.php';
if ( !empty($_REQUEST['passwordAdmin']) and !empty($_REQUEST['loginAdmin']) ) {
    //Пишем логин и пароль из формы в переменные (для удобства работы):

    $loginAdminCoo = $_POST['loginAdmin'];
    $loginAdmin = $_REQUEST['loginAdmin'];
    $passwordAdmin = $_REQUEST['passwordAdmin'];
    $query = 'SELECT*FROM adminusers WHERE loginAdmin="'.$loginAdmin.'" AND passwordAdmin="'.$passwordAdmin.'"';
    $result = mysqli_query($link, $query); //ответ базы запишем в переменную $result.
    $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

    if (!empty($user)) {


        setcookie('loginAdmin', $loginAdminCoo,time() + 60 * 60 * 24 * 365, "/");

        header('Location: ./index.php');


        session_start();


    } else {
        echo "<script>alert(\"Вы ввели неверный логин или пароль!\");</script>";
        echo '<script> window.location.href="login.php"</script>';
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../style/tailwind.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>


    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

    <style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>

    <div class="min-w-screen min-h-screen  flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500  w-full " style="max-width:500px">


                <div class="w-full md:w-1/1 py-10 px-5 ">
                    <div class="text-center mb-30">
                        <h1 class="font-bold text-3xl text-gray-900">Войти</h1>
                        <p>Введите ваши данные от Админ Панели</p>
                    </div>
                    <div>
                        <form id="btnLoginAdmin"  method="POST">

                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Логин</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                        <input name="loginAdmin" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Введите ваш логин">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Пароль</label>
                                    <div class="flex">
                                        <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                        <input name="passwordAdmin" type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5" style="">
                                    <input type="submit" name="btnLoginAdmin" form="btnLoginAdmin" value="Войти" style="background: rgb(4, 136, 180);" class="block w-full max-w-xs mx-auto hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                        </form>
                        <br>

                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</body>
