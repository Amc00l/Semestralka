<?php
require_once "../View.php";
$view= new View();
include("../Server.php");
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
                    <div class="offer" id="Items">
                        <script>
                            function loadPage(page, paModel) {
                                var model = $(paModel).attr("id");
                                var clickedLoad = "clickedLoad"
                                $.ajax({
                                    url:"../Server.php",
                                    method:"POST",
                                    data:{model: model, page: page, clickedLoad:clickedLoad},
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
    <div id="show" class="modal">
        <div class="modal-content">
            <div class="clos">
                <span class="close1">X</span>
            </div>
            <div class="inModal">
                <p id="par">...</p>
            </div>

        </div>
    </div>



    <script>

        function showInfo(idButton,text) {
            console.log(text);
            let modal = document.getElementById("show");
            let span = document.getElementsByClassName("close1")[0];
            document.getElementById("par").innerHTML=text;
            modal.style.display = "block";
            span.onclick = function() {
                modal.style.display = "none";
            }

        }
        $(document).ready(function() {
            $(document).on('click', '.add_item_to_cart', function () {
                var id = $(this).attr("id");
                var mod  = $('#modelId' + id + '').val();
                var partName = $('#partName' + id + '').val();
                var quantity = $('#quantity' + id + '' ).val();
                var partPrice = $('#partPrice' + id + '').val();
                var clickedAddToCart = "addToCart";
                if(quantity > 0 ) {
                    $.ajax({
                        url:"../Server.php",
                        method:"POST",
                        data:{id: id, mod: mod, partName: partName, quantity: quantity, partPrice: partPrice,clickedAddToCart: clickedAddToCart },
                        success:function()
                        {
                            alert("Produkt pridaný do košíka")
                        }
                    })

                } else {
                    alert("Zle zadaná kapacita")
                }
            });
        });

    </script>


    <?php $view->showFooter(); ?>


</div>






</body>
</html>

