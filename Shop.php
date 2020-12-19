<?php
include('Server.php');
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
require "View.php";
$view = new View();



?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Shop</title>
    <?php
    $view->headerRequimenets();

    ?>


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

    <div class="Obsah">
        <div class="Text">
            <div class="Eshop">

                <div class="d-flex flex-wrap justify-content-md-between">

                    <div class="d-flex align-items-center">
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka" width="270" height="170">
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="Pictures/Engine.jpg" alt="Motor" width="270" height="170">
                    </div>
                    <div>
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka"width="270" height="170">
                    </div>

                    <div class="Transmission">
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka" width="270" height="170">
                    </div>
                    <div class="Engine">
                        <img src="Pictures/Engine.jpg" alt="Motor" width="270" height="170">
                    </div>
                    <div class="Transmission">
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka"width="270" height="170">
                    </div>

                    <div class="Transmission">
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka" width="270" height="170">
                    </div>
                    <div class="Engine">
                        <img src="Pictures/Engine.jpg" alt="Motor" width="270" height="170">
                    </div>
                    <div class="Transmission">
                        <img src="Pictures/Transmision.jpg" alt="Prevodovka"width="270" height="170">
                    </div>





                </div>

            </div>






        </div>






    </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>

