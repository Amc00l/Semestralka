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
    <script src="../js/jquery.min.js"></script>

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
            <div class="container">
                <h1>Modely</h1>
                <ul class="nav justify-content-center nav-tabs" role="tablist">
                    <li class="nav-item">
                        <div class="nav-link" id="65" data-toggle="tab" onclick="loadPage(1,this);">SX65</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" id="125" data-toggle="tab" onclick="loadPage(1,this);">SX125</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" id="250" data-toggle="tab" onclick="loadPage(1,this);">SXF250</div>

                    </li>
                    <li class="nav-item">
                        <div class="nav-link" id="300" data-toggle="tab" onclick="loadPage(1,this);">EXC300</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" id="350" data-toggle="tab" onclick="loadPage(1,this);">SXF350</div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link" id="450" data-toggle="tab" onclick="loadPage(1,this);">SXF450</div>

                    </li>
                </ul>
                <h2>Položky</h2>
                <div class="text-center">
                    <div id="Items">
                        <script>
                            function loadPage(page, paModel) {
                                var model = $(paModel).attr("id");
                                $.ajax({
                                    url:"ServerEshop.php",
                                    method:"POST",
                                    data:{model: model, page: page},
                                    success:function(data)
                                    {
                                        $('#Items').html(data);
                                    }
                                })
                            }
                        </script>

                    </div>

            </div>








            </div>
        </div>



    </div>


    <script>

        $(document).ready(function() {
            $(document).on('click', '.add_item_to_cart', function () {
                var id = $(this).attr("id");
                var model  = $('#modelId' + id + '').val();
                var partName = $('#partName' + id + '').val();
                var quantity = $('#quantity' + id + '' ).val();
                var partPrice = $('#partPrice' + id + '').val();
                if(quantity > 0 ) {
                    $.ajax({
                        url:"ServerCart.php",
                        method:"POST",
                        data:{id: id, model:model, partName: partName, quantity: quantity, partPrice:partPrice},

                        success:function()
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






    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>






</body>
</html>
