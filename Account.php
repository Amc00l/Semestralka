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
                <h1>Účet</h1>

                    <form action="ChangePass.php" method="post">
                        <div class="userInfo">
                            <p>Užívateľ: <?php echo $user->getUsername(); ?></p>
                            <p>Meno: <?php echo $user->getName(); ?></p>
                            <p>Priezvisko: <?php echo $user->getSurname(); ?></p>
                            <p>Email: <?php echo $user->getEmail(); ?></p>

                        </div>


                        <div class="form-group">
                            <div class="userInfo">
                                <input type="submit" class="btn btn-dark" value="Zmena hesla">
                            </div>
                        </div>

                    </form>


                    <form action="" method="post">

                        <div class="form-group">
                            <div class="userInfo">
                                <input type="submit" name="Delete" class="btn btn-dark" value="Zmazať účet">
                            </div>
                        </div>

                    </form>

            </div>


        </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>
