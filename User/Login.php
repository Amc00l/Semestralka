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
            <h1>Prihlasenie</h1>
            <form action="Login.php" method="post">
                <label>Prihlasovacie meno</label>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="LoginID" >
                </div>

                <label>Heslo</label>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">

                </div>

                <div class="form-group">
                    <input type="submit" name="Prihlásiť" class="btn btn-dark" value="Prihlásiť">
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


