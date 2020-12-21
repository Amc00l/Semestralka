<?php
include('Server.php');
include('Database.php');
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
require "View.php";
$view = new View();

$database = new Database();

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

            <h1>Položky</h1>


            <div class="row">
                <?php
                    $database->selectFromDatabaseForEshopParameters(65);

                ?>
            </div>


            <div class="text-center">
                <button type="button" class="btn btn-dark"><<</button>
                <button type="button" class="btn btn-dark">>></button>
            </div>

        </div>






    </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>

