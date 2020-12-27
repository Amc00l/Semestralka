<?php
require_once "../View/View.php";
$view= new View();
include("Server.php");


?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Prihlasenie</title>
    <link rel="stylesheet" href="../Style.css">
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
        <div class="Format">
            <h1>Zmena hesla</h1>
            <form action="ChangePass.php" method="post">


                <label> <br>Staré heslo </label>
                <div class="form-group">
                    <input type="password" name="passOld" class="form-control" placeholder="Staré heslo" >
                </div>

                <label> <br>Nové heslo </label>
                <div class="form-group">
                    <input type="password" name="passNew" class="form-control" placeholder="Nové heslo">

                </div>

                <label> <br>Potvrdenie nového heslo </label>
                <div class="form-group">
                    <input type="password" name="passConfirm" class="form-control" placeholder="Nové heslo znova">

                </div>

                <div class="form-group">
                    <input type="submit" name="Zmenit" class="btn btn-dark" value="Zmeniť">
                </div>

                <?php
                    $view->errors($_SESSION['array']);
                ?>



            </form>



        </div>

    </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>


</body>

</html>


