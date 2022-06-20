<?php include 'header.php';

$sql = "SELECT * FROM `sliders` WHERE `idSlide`= 1";
$sql2 = "SELECT * FROM `sliders` WHERE `idSlide`= 2";
$sql3 = "SELECT * FROM `sliders` WHERE `idSlide`= 3";

$result = mysqli_query($link, $sql);
$result = mysqli_fetch_assoc($result);

$result2 = mysqli_query($link, $sql2);
$result2 = mysqli_fetch_assoc($result2);

$result3 = mysqli_query($link, $sql3);
$result3 = mysqli_fetch_assoc($result3);

echo '

<div class="carousel relative shadow-2xl bg-white">
    <div class="carousel-inner relative overflow-hidden w-full">
        <!--Slide 1-->
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item absolute opacity-0" style="height: 90vh">
            <div class="informationSlider">
                <h1>'.$result["headingSlide"].'</h1>
                <p>'.$result['textSlide'].'
                    </p>
                <a href="'.$result["linkButton"].'"><button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                  '.$result["nameButton"].'
                </button>
                </a>
            </div>
            <img class="block h-full w-full" src="'.$result["imageSlide"].'" alt="">

        </div>

        <label for="carousel-3" class="prev control-1 w-20 h-20 ml-1 md:ml-10 absolute cursor-pointer hidden  font-bold text-black hover:text-white rounded-full  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-2" class="next control-1 w-20 h-20 mr-1 md:mr-10 absolute cursor-pointer hidden  font-bold text-black hover:text-white rounded-full  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
        <!--Slide 2-->
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0" style="height:90vh;">
            <div class="informationSlider">
                <h1>'.$result2["headingSlide"].'</h1>
                <p>'.$result2['textSlide'].'</p>
                <a href="'.$result2["linkButton"].'"><button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                  '.$result2["nameButton"].'
                </button>
                </a>
            </div>
            <img class="block h-full w-full" src="'.$result2["imageSlide"].'" alt="">
        </div>
        <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!--Slide 3-->
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item absolute opacity-0" style="height:90vh;">
            <div class="informationSlider">
                <h1>'.$result3["headingSlide"].'</h1>
                <p>'.$result3['textSlide'].'</p>
             
              <a href="'.$result3["linkButton"].'"><button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                  '.$result3["nameButton"].'
                </button>
                </a>
             
            </div>
            <img class="block h-full w-full" src="'.$result3["imageSlide"].'" alt="">
        </div>
        <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
        <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

        <!-- Add additional indicators for each slide-->
        <ol class="carousel-indicators">
            <li class="inline-block mr-3">
                <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white ">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white ">•</label>
            </li>
            <li class="inline-block mr-3">
                <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white ">•</label>
            </li>
        </ol>

    </div>
</div> ';
?>
<?php include 'footer.php'?>
</body>
</html>
