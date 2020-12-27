<?php

require_once "../View/View.php";
$view= new View();
include("../User/Server.php");

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Domov</title>
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

            <h1>Úvod</h1>

            <p>
                Vitajte na mojej stránke.
                Obsah webu je orientovaný na značku KTM a jej dvojtaktné a štvortaktné modely.
                Kľúčovým strojom je pre mňa KTM SX 125, ničmenej som schopný poradiť aj s 2T a 4T motocyklami inej značky.

            </p>
            <p>
                Motocyklom sa venujem už prakticky od malička. Prvý môj motocykel bol pionier 50cc.
                Následne som prešiel na kubatúru 125cc. Prvá moja 125-tka bol pitbike, 4-dobý motocykel. Ďalšia bola Aprilia RX 125, ktorú doteraz vlastním.
                Posledná z mojích motocyklov je KTM SX 125. Viď foto.
            </p>
            <div class="Sx125">
                <a>
                    <img src="../Pictures/IMG_20200310_171109.jpg" alt= "MyKtm" style="width: 100%">
                </a>
                <div class="desSX125">KTM SX 125 2002</div>
            </div>


        </div>


    </div>
    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>