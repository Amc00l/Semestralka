<?php
    include ('Server.php');
    require('View.php');
    $view = new View();

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Registrácia</title>
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

    <div class="Obsah">
        <div class="Format">
            <h1>Registrácia</h1>
            <form action="Registration.php" method="post"
                <p> Prihlasovacie meno</p>

                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="LoginID" >
                </div>

                <p> <br>Heslo </p>
                <div class="form-group">
                    <input type="password" name="password" v class="form-control" placeholder="Password" >

                </div>

                <p> <br>Meno</p>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name"  >
                </div>

                <p> <br>Priezvisko</p>
                <div class="form-group">
                    <input type="text" name="surname" class="form-control" placeholder="Surname" >
                </div>

                <p> <br>Email</p>
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


