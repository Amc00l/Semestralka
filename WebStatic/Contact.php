<?php
require_once "../View.php";
$view= new View();
include("../Server.php");

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Kontakt</title>
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
        <div class="TextKontakt">
            <h1> <br>KONTAKT</h1>
            <h2><br>Sídlo firmy</h2>
            <p> B.A.CH., s. r. o.
                <br> Kukučínova ulica 262
                <br> Považská Bystrica
            </p>

            <h1><br>KAMENNÁ PREDAJŇA</h1>
            <p>
                Streženická cesta 748
                <br> 020 01 Púchov
                <br> GPS: 49.1157285, 18.3103028
                <br>  49°6'56.617"N, 18°18'44.925"E

            </p>

            <h2> <br><strong>Otváracie hodiny </strong></h2>
            <p>
                Po - Pia:  	10:00 - 17:00
                <br> So:  	09:00 - 12:00
                <br> Ne:  	Zatvorené
            </p>

            <h1><br>KONTAKTNÉ ÚDAJE</h1>
            <p> Motocykle, náhradné diely, reklamácie: +421 911 111 111
                <br> Predaj na splátky, predĺžená záruka, fakturácia: +421 911 111 111
                <br> Servis: +421 911 111 111
                <br> Email: <a href="mailto:ktm@gmail.com"> ktm@gmail.com</a>

            </p>


        </div>


    </div>



    <?php $view->showFooter(); ?>

</div>

</body>
</html>