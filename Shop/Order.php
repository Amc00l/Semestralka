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
            <form action="../View/Home.php" onsubmit="createOrder();return false;">
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
                        <input type="number" class="form-control" id="PSC" placeholder="018 16">
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
                    <input type="submit"  id="Potvrdit" name="Potvrdit" class="btn btn-dark" value="Potvrdiť">
                </div>
            </form>

        </div>

    </div>

    <script>
        function createOrder() {
            var name = $('#Meno').val();
            var surname = $('#Priezvisko').val();
            var address = $('#Obec').val();
            var address2 = $('#Ulica').val();
            var city = $('#Mesto').val();
            var zip = $('#PSC').val();
            var country = $('#Stat').val();
            var selected = $('#inputState').val();
            var checkBox = document.getElementById("gridCheck");
            var aggre = " ";
            if(checkBox.checked) {
                aggre ="checked";

            }
            console.log(gridCheck);
            var clickedConfirm = "Potvrdit";
            $.ajax({
                url:"../User/Server.php",
                method:"POST",
                data:{name: name, surname: surname, address: address, address2:address2,city: city,zip: zip,country: country,selected:selected, clickedConfirm:clickedConfirm, aggre:aggre},
                success:function(data)
                {
                    if(data === "ok") {
                        alert("Objednávka vytvorená");
                        window.location.href="../View/Home.php";
                    } else {
                        alert(data);

                    }

                }
            });


        }




    </script>





    <?php $view->showFooter(); ?>

</div>






</body>
</html>

