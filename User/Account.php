<?php

    require_once "../View.php";
    $view= new View();
    include("../Server.php");
    if(isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    }

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Účet</title>
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



                    <form method="post">

                        <div class="form-group">
                            <div class="userInfo">
                                <input type="submit" name="Delete" class="btn btn-dark" value="Zmazať účet" onclick="alert('Účet zmazaný');">
                            </div>
                        </div>

                    </form>
                <?php

                if(isset($_SESSION["user"])) {
                    if($user->getUsername() === "admin") { ?>
                        <form action="AdminAddItem.php" method="post">

                            <div class="form-group">
                                <div class="userInfo">
                                    <input type="submit" name="Add" class="btn btn-dark" value="Pridať item">
                                </div>
                            </div>

                        </form> <?php

                    }
                }
                ?>



            </div>


        </div>



        <?php $view->showFooter(); ?>


</div>



</body>
</html>
