<?php
//include('Database.php');
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
require "View.php";
$view = new View();
//$database = new Database();


?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Shop</title>
    <?php
    $view->headerRequimenets();
    ?>

    <script>
        var model = document.getElementById("")
        function showPage(number) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("NextPage").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","Database.php?q="+number + '&type'+ model,true);
            xmlhttp.send()

        }
    </script>
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

                </div>
                <button type="button" class="btn btn-dark" value="1"  onclick="showPage(this.value)">1</button>
                <button type="button" class="btn btn-dark" value="2" onclick="showPage(this.value)">2</button>
                <button type="button" class="btn btn-dark" value="3" onclick="showPage(this.value)">3</button>

            </div>




        </div>






    </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>

