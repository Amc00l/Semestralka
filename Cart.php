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
                    <tbody>
                    <tr>
                        <?php $view->showCartItem();?>
                    </tr>

                    </tbody>
                </table>

            </div>

            <script>
                $(document).ready(function() {
                    $(document).on('click', '.add_item_to_cart', function () {
                        var id = 2//$(this);
                        console.log(id);
                        var model  = <?php echo $_GET['type'];?>;
                        var partName = $('#partName' + id + '').val();
                        var quantity = $('#quantity' + id + '' ).val();
                        var partPrice = $('#partPrice' + id + '').val();
                        if(quantity > 0 ) {
                            $.ajax({
                                url:"ServerCart.php",
                                method:"POST",
                                data:{id: id, model:model, partName: partName, quantity: quantity, partPrice:partPrice},

                                success:function(data)
                                {
                                    alert("Produkt pridaný do košínka")
                                }
                            })

                        } else {
                            alert("Zle zadaná kapacita")
                        }
                    });
                });


            </script>




        </div>


    </div>







    <div class="Pata">
        <p>Copyright 2020 ©</p>

    </div>

</div>


</body>
</html>