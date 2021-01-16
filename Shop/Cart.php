<?php
require_once "../View.php";
$view= new View();
require_once("../Controller.php");
include("../Server.php");
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Košík</title>
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
            <h1>Košík</h1>
            <div class="Table table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Typ motocykla</th>
                        <th scope="col">Názov diela</th>
                        <th scope="col">Cena/kus</th>
                        <th scope="col">Množstvo</th>
                        <th scope="col">Celkova cena v €</th>
                        <th scope="col">Odstraniť</th>
                    </tr>
                    </thead>
                    <tbody id="table">

                        <?php
                            $view->showCartItem();
                        ?>


                    </tbody>
                </table>

            </div>
            <div class="d-flex justify-content-center" id="createButton">
                <script>
                    showButton();
                    function showButton() {
                        var clickedCreateOrder = "createOrder";
                        $.ajax({
                            url: "../Server.php",
                            method:"POST",
                            data: {clickedCreateOrder: clickedCreateOrder},
                            success:function(data) {
                                $('#createButton').html(data);
                            }
                        })
                    }
                </script>

            </div>
        </div>



    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.removeAll', function () {
            var clickedRemoveAll = "removeAllItems";
                $.ajax({
                    url: "../Server.php",
                    method:"POST",
                    data: {clickedRemoveAll: clickedRemoveAll},
                    success:function(data)
                    {
                        alert("Košík vyprázdnený");
                        $('#table').html(data);
                    }
                })
                showButton();
            });

            $(document).on('click', '.remove_from_cart', function () {
                var id = $(this).attr("id");
                var clickedRemoveItem = "removeItem";
                $.ajax({
                    url: "../Server.php",
                    method: "POST",
                    data: {id: id, clickedRemoveItem: clickedRemoveItem},
                    success: function (data) {
                        alert("Produkt odstránený z košíka")
                        $('#table').html(data);

                    }
                })
               showButton();
            });

        });

    </script>

    <?php $view->showFooter(); ?>

</div>


</body>
</html>