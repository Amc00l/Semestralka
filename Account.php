<?php
    include ('Server.php');
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    require "View.php";
    $view = new View();



?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Prihlaseny</title>
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
            <div class="Text">
                <h1>Účet</h1>

                <form action="ChangePass.php" method="post">

                        <p>Užívateľ: <?php echo $user->getUsername(); ?></p>
                        <p>Email: <?php echo $user->getEmail(); ?></p>

                        <div class="form-group">
                            <input type="submit" class="btn btn-dark" value="Zmena hesla">
                        </div>



                </form>

                <form action="" method="post">

                    <div class="form-group">
                        <input type="submit" name="Delete" class="btn btn-dark" value="Zmazať účet">
                    </div>

                </form>
            </div>





            </div>


    </div>
    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>
