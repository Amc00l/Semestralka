<?php
require_once "../View/View.php";
$view= new View();
include("../User/Server.php");
?>

<!DOCTYPE html>
<html lang="sk">

<head>

    <title>Shop</title>
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
            <h1>Vytvorenie objednávky</h1>
            <form action="../View/Home.php" onsubmit="alert('Úspešne vytvorená')">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Meno</label>
                        <input type="text" class="form-control" id="Meno" placeholder="Meno">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Priezvisko</label>
                        <input type="text" class="form-control" id="Priezvisko" placeholder="Priezvisko">
                    </div>
                </div>
                <div class="form-group">
                    <label>Obec</label>
                    <input type="text" class="form-control" id="Obec" placeholder="Obec">
                </div>
                <div class="form-group">
                    <label>Ulica</label>
                    <input type="text" class="form-control" id="Ulica" placeholder="Ulica, č. domu">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Mesto</label>
                        <input type="text" class="form-control" id="Mesto">
                    </div>

                    <div class="form-group col-md-4">
                        <label>PSČ</label>
                        <input type="text" class="form-control" id="PSC">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Štát</label>
                        <input type="text" class="form-control" id="Stat">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 align-items-center" >
                        <label for="inputState">Spôsob dopravy</label>
                        <select id="inputState" class="form-control">
                            <option selected>Vybrať...</option>
                            <option>Osobný odber</option>
                            <option>Kurier</option>
                            <option>Pošta</option>
                            <option>Zásielkovňa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Súhlasím so spracovaním objednávky
                        </label>
                    </div>
                </div>
                <div class="col text-center">
                    <button type="submit" class="btn btn-dark btn-cent">Vytvoriť</button>
                </div>
            </form>



        </div>
    </div>





    <?php $view->showFooter(); ?>

</div>






</body>
</html>

