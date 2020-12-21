<?php
require "View.php";
$view=new View();
include ('Server.php');

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

    if(isset($_SESSION['login'])) {
        $view->navbarLoggedInUser();
    } else {

        $view->navbarLoggedOutUser();
    }

    ?>

    <div class="Obsah">
        <div class="Format"> </div>





    </div>







    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>

</div>


</body>
</html>