
<?php
        require "View.php";
        $view=new View();
        include ('Server.php');

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Modely</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

<div class="BackGround">


    <?php

        if(isset($_SESSION['login'])) {
            $view->navbarLoggedInUser();
        } else {

            $view->navbarLoggedOutUser();
        }

    ?>

    <div class="gallery">

        <div class="model65">
            <a>
                <img src="Pictures/sx65.png" alt="SX65cc" width="380" height="280">
            </a>
            <div class="desc65">KTM SX 65</div>

        </div>

        <div class="model125">
            <a>
                <img src="Pictures/model125.png" alt="SX125cc" width="380" height="280">
            </a>
            <div class="desSX125">KTM SX 125</div>
        </div>

        <div class="model250">
            <a>
                <img src="Pictures/ktmsxf250.png" alt="SXf250cc" width="380" height="280">
            </a>
            <div class="descSX250">KTM SXF 250</div>
        </div>

        <div class="model300">
            <a>
                <img src="Pictures/ktm%20300exc.png" alt="EXC300cc"  width="380" height="280">
            </a>
            <div class="desc300">KTM EXC 300</div>
        </div>

        <div class="model350">
            <a>
                <img src="Pictures/SXF350.png" alt="SXf350cc" width="380" height="280">
            </a>
            <div class="dex350">KTM SXF 350</div>

        </div>

        <div class="model450">
            <a>
                <img src="Pictures/SXF450.png" alt="SXf450cc" width="380" height="280">
            </a>
            <div class="dex450">KTM SXF 450</div>

        </div>

    </div>

    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>

</div>






</body>
</html>