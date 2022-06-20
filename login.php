<?php  include "header.php";

?>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

<style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>

<div class="min-w-screen min-h-screen  flex items-center justify-center px-5 py-5">
    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
        <div class="md:flex w-full">
            <div class="hidden md:block w-1/2 bg-indigo-500 ">
                <img src="image/slider-3.jpeg" style="width: 100%; height: 500px">
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">Войти</h1>
                    <p>Введите ваши данные при регистрации</p>
                </div>
                <div>
                    <form id="formLogin" action="actions/loginAction.php" method="POST">

                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Логин</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input name="login" type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Введите ваш логин">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Пароль</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                <input name="password" type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                            </div>
                        </div>
                    </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5" style="">
                                <input type="submit" name="btnLogin" form="formLogin" value="Войти" style="background: rgb(4, 136, 180);" class="block w-full max-w-xs mx-auto hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
                    </form>
                                <br>
                                <div style="position: relative; left:35%; font-size: 17px">
                                <p>Нет аккаунта?</p><a style="color:rgba(43,120,203,0.64);" href="reg.php">Создать аккаунт</a>
                               </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"?>
