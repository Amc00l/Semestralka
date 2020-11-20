<?php
    require "View.php";
    $view=new View();
    include ('Server.php');

?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Informacie</title>
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
            <h1>KTM Sportmotorcycle AG</h1>
            <h2>KTM</h2>
            <p> KTM je rakúsky výrobca motocyklov, bicyklov a mopedov.
                Spoločnosť bola založená v roku 1934 inžinierom Hansom Trunkenpolzom v Mattighofene.
                Začala kovoobrábaním a bola nazvaná Kraftfahrzeuge Trunkenpolz Mattighofen.
                V roku 1954 začala spoločnosť vyrábať motocykle.
                KTM je známa výrobou terénnych motocyklov, aj keď v posledných rokoch rozšírila výrobu na cestné motocykle.
            </p>
            <h2>História</h2>

            <p> Spoločnosť založil r. 1934 rakúsky inžinier Hans Trunkenpolz v Mattighofene.
                Začínal ako zámočnícky obchod a volal sa Kraftfahrzeug Trunkenpolz Mattighofen.
                V roku 1937 začal opravovať a predávať motocykle DKW, na ďalší rok aj Opel.
            </p>

            <h2>Produkcia motocyklov</h2>

            <p> Po druhej svetovej vojne začal Trunkenpolz rozmýšlať o výrobe vlastných motocyklov a prvý prototyp bol dokončený v roku 1953.
                Sériová produkcia začala v roku 1954, takmer všetky komponenty si vyrábal doma s výnimkou motorov, vyrábaných najčastejšie spoločnosťou Rotax.
                Len s 20 zamestnancami dokázal vyrobiť 3 kusy za deň.
                V roku 1955, sa podnikateľ Ernst Kronreif stal akcionárom spoločnosti, získaním značnej časti spoločnosti.
                Spoločnosť bola premenovaná na Kronreif & Trunkenpolz Mattighofen.
                Výroba prvého mopedu od KTM nazývaného Mecky bola spustená v roku 1957, nasledoval Ponny I v roku 1960 a Ponny II v roku 1962.
                Týmto sa začala produkcia motocyklov.
                Popritom bola KTM schopná vyrábať motocykle pre súťažné účely.
                Kronreif zomrel v roku 1960 a Trunkenpolz o dva roky neskôr na infarkt.
                Názov spoločnosti sa znova zmenil na Krafträder Trunkenpolz Mattighofen keď jeho syn
                Erich prevzal a riadil spoločnosť až do svojej smrti (1989). V tej dobe mala KTM okolo 180 zamestnancov a obrat ktorý predstavoval €3,5 Milióna.
                V roku 1978 bola založená americká pobočka KTM North America Inc. v Lorain, Ohio. Medzinárodný obchod vtedy činil 72% obratu spoločnosti.
                V roku 1980 bola spoločnosť premenovaná na KTM Motor-Fahrzeugbau KG.

            </p>
        </div>
    </div>
    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>




</div>





</body>
</html>