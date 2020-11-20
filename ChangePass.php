<?php
    include ('Server.php');
    require('View.php');
    $view = new View();


?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Prihlasenie</title>
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


