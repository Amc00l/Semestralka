<?php
    include ('Server.php');
    require('View.php');
    $view = new View();

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Registrácia</title>
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
            <h1>Registrácia</h1>
            <form action="Registration.php" method="post"
                <label> Prihlasovacie meno</label>

                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="LoginID" >
                </div>

                <label>Heslo</label>
                <div class="form-group">
                    <input type="password" name="password" v class="form-control" placeholder="Password" >

                </div>

                <label>Meno</label>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name"  >
                </div>

                <label>Priezvisko</label>
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Surname" >
                </div>

                <label>Email</label>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" >
                </div>

                <div class="form-group">
                    <input type="submit"  name="Registrovať" class="btn btn-dark" value="Registrovať">
                </div>
                <p>Máte už účet? <a href="Login.php">Prihlasiť</a> </p>
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


