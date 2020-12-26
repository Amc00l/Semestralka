<?php
require "View.php";
$view = new View();
include ('Server.php');
$counter = 1;

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

    if(isset($_SESSION['login'])) {
        $view->navbarLoggedInUser();
    } else {

        $view->navbarLoggedOutUser();
    }
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
                    <tr>
                        <?php
                        $view->showCartItem();
                        ?>
                    </tr>

                    </tbody>
                </table>

            </div>


        </div>


    </div>

    <script>

        $(document).ready(function() {

            $(document).on('click', '.removeAll', function () {
                $.ajax({
                    url: "Destroy.php",
                    method:"POST",
                    success:function(data)
                    {
                        alert("Košík vyprázdnený");
                        $('#table').html(data);


                    }
                })
            });

            $(document).on('click', '.remove_from_cart', function () {
                var id = $(this).attr("id");
                $.ajax({
                    url: "DestroyItem.php",
                    method: "POST",
                    data: {id: id},
                    success: function (data) {
                        alert("Produkt odstránený z košíka")
                        $('#table').html(data);

                    }
                })
            });


        });

    </script>





    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>

</div>


</body>
</html>