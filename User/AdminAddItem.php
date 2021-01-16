<?php

require_once "../View/View.php";
$view= new View();
include("../User/Server.php");
?>

<!DOCTYPE html>
<html lang="sk">

<head>

    <title>Položka</title>
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
            <h1>Pridanie položky</h1>
            <form action="../View/Home.php" onsubmit="addItem();return false;">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label>Id dielu</label>
                        <input type="number" class="form-control" id="idPart" placeholder="Číslo dielu" min="0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Názov dielu</label>
                        <input type="text" class="form-control" id="PartName" placeholder="Názov">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Cena</label>
                        <input type="number" class="form-control" id="Price" placeholder="Cena" step=".01" min="0">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Model</label>
                        <input type="number" class="form-control" id="Model" placeholder="Model">
                    </div>


                </div>
                <div class="form-group">
                    <label>Text</label>
                    <input type="text" class="form-control" id="Text" placeholder="Text položky">
                </div>
                <div class="form-group">
                    <label>Image location</label>
                    <input type="text" class="form-control" id="Location" placeholder="../Pictures/nazov.jpg">
                </div>
                <div class="col text-center">
                    <input type="submit"  id="Potvrdit" name="Pridat" class="btn btn-dark" value="Pridať">
                </div>
            </form>

        </div>

    </div>



    <?php $view->showFooter(); ?>

</div>

<script>
    function addItem() {
        var idPart = $('#idPart').val();
        var PartName = $('#PartName').val();
        var Price = $('#Price').val();
        var Text = $('#Text').val();
        var Model = $('#Model').val();
        var Location = $('#Location').val();
        var clickedAdd = "Pridat";
        $.ajax({
            url:"../User/Server.php",
            method:"POST",
            data:{idPart: idPart, PartName: PartName, Price: Price, Text:Text, Model: Model, Location: Location, clickedAdd: clickedAdd},
            success:function(data)
            {
                if(data === "ok") {
                    alert("Položka pridaná");
                } else {
                    alert(data);

                }

            }
        });


    }

</script>

</body>
</html>

