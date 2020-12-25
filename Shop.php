<?php

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
require "View.php";
$view = new View();


?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Shop</title>
    <?php
    $view->headerRequimenets();

    ?>
    <script src="../Semestralka/js/jquery.min.js"></script>

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

            <h1>Položky</h1>

            <div class="text-center">
                <div class="row" id="NextPage">

                    <script>
                        loadPage(1);

                        function loadPage(page) {
                            var model  = <?php echo $_GET['type'];?>;

                            $.ajax({
                                url:"ServerEshop.php",
                                method:"POST",
                                data:{model: model, page: page},
                                success:function(data)
                                {
                                    $('#NextPage').html(data);
                                }

                            })

                        }


                        /*
                        showPage(1);
                        function showPage(number) {
                            var xmlhttp = new XMLHttpRequest();
                            var model = <?php //echo $_GET['type'];?>;
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    console.log(this.responseText);
                                    document.getElementById("NextPage").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET", "ServerEshop.php?page=" + number + "&model=" + model, true);
                            xmlhttp.send()
                        }
*/
                    </script>



                </div>
                <button type="button" class="btn btn-dark" value="1"  onclick="loadPage(this.value)">1</button>
                <button type="button" class="btn btn-dark" value="2" onclick="loadPage(this.value)">2</button>
                <button type="button" class="btn btn-dark" value="3" onclick="loadPage(this.value)">3</button>


            </div>






            </div>





        </div>






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






    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>

