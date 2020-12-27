<?php

    require_once "../View/View.php";
    $view= new View();
    include("Server.php");
    if(isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    }




?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Prihlaseny</title>
    <link rel="stylesheet" href="../Style.css">
    <?php
        $view->headerRequimenets();

    ?>


</head>

<body>
    <div class="BackGround">

        <?php
        $view->showNavbar();


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
                                <input type="submit" name="Delete" class="btn btn-dark" value="Zmazať účet" onclick="alert('Účet zmazaný');">
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
