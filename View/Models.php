
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
                <img id="ktm65" src="../Pictures/sx65.png" alt="SX65cc" width="380" height="280">
                <div class="desc65">KTM SX 65</div>
            </div>

            <div class="model125">
                <img id="ktm125" src="../Pictures/model125.png" alt="SX125cc" width="380" height="280">
                <div class="desSX125">KTM SX 125</div>
            </div>

            <div class="model250">
                <img id="ktm250" src="../Pictures/ktmsxf250.png" alt="SXf250cc" width="380" height="280">
                <div class="desSX125">KTM SXF 250</div>
            </div>

            <div class="model300" id="300">
                <img id="ktm300" src="../Pictures/ktm%20300exc.png" alt="EXC300cc" width="380" height="280">
                <div class="desc300">KTM EXC 300</div>

            </div>

            <div class="model350">
                <img id="ktm350" src="../Pictures/SXF350.png" alt="SXf350cc" width="380" height="280">
                <div class="dex350">KTM SXF 350</div>

            </div>

            <div class="model450">
                <img id="ktm450" src="../Pictures/SXF450.png" alt="SXf450cc" width="380" height="280">
                <div class="dex450">KTM SXF 450</div>

            </div>



        </div>
    </div>

    <?php $view->showFooter(); ?>


</div>
<div id="myModal" class="modal">
    <span class="close">X</span>
    <img class="modal-content" id="modalImage" src="../Pictures/SXF350.png" alt="SXf350cc">
</div>

<script>
    $("img").click(function() {
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("modalImage");
        modal.style.display = "block";
        modalImg.src = this.src;
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
    });
</script>

</body>
</html>