
<?php
require_once "../View/View.php";
$view= new View();
include("../User/Server.php");

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Modely</title>
    <?php
        $view->headerRequimenets();

    ?>

</head>

<body>

<div class="BackGround">


    <?php

       $view->showNavbar();

    ?>
    <div class="Galler">
        <div class="gallery">

            <div class="model65">
                    <img src="../Pictures/sx65.png" alt="SX65cc" width="380" height="280">
                <div class="desc65">KTM SX 65</div>

            </div>

            <div class="model125">
                    <img src="../Pictures/model125.png" alt="SX125cc" width="380" height="280">
                <div class="desSX125">KTM SX 125</div>
            </div>

            <div class="model250">
                    <img src="../Pictures/ktmsxf250.png" alt="SXf250cc" width="380" height="280">
                <div class="desSX125">KTM SXF 250</div>
                </a>
            </div>

            <div class="model300" id="300">
                    <img src="../Pictures/ktm%20300exc.png" alt="EXC300cc" width="380" height="280">
                <div class="desc300">KTM EXC 300</div>

            </div>

            <div class="model350">
                    <img src="../Pictures/SXF350.png" alt="SXf350cc" width="380" height="280">
                <div class="dex350">KTM SXF 350</div>

            </div>

            <div class="model450">
                    <img src="../Pictures/SXF450.png" alt="SXf450cc" width="380" height="280">
                <div class="dex450">KTM SXF 450</div>

            </div>

        </div>
    </div>

    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>

</div>






</body>
</html>