<?php
require_once "../View/View.php";
$view= new View();
include("Server.php");


?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Zmena</title>
    <link rel="stylesheet" href="../Style.css">
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
        <div class="Format">
            <h1>Zmena hesla</h1>
            <form action="ChangePass.php" method="post" onsubmit="changePass();return false;">


                <label> <br>Staré heslo </label>
                <div class="form-group">
                    <input type="password" id="passOld" name="passOld" class="form-control" placeholder="Staré heslo" >
                </div>

                <label> <br>Nové heslo </label>
                <div class="form-group">
                    <input type="password" id="passNew" name="passNew" class="form-control" placeholder="Nové heslo">

                </div>

                <label> <br>Potvrdenie nového heslo </label>
                <div class="form-group">
                    <input type="password" id="passConfirm" name="passConfirm" class="form-control" placeholder="Nové heslo znova">

                </div>

                <div class="form-group">
                    <input type="submit" name="Zmenit" id="btn" class="btn btn-dark" value="Zmeniť">
                </div>

                <div id="error">



                </div>



            </form>



        </div>

    </div>



    <?php $view->showFooter(); ?>


</div>
<script>

    function changePass() {
        var passOld = $('#passOld').val();
        var passNew = $('#passNew').val();
        var passConfirm = $('#passConfirm').val();
        var clickedChange = "Zmenit";
        $.ajax({
            url:"Server.php",
            method:"POST",
            data:{passOld: passOld, passNew: passNew, passConfirm:passConfirm, clickedChange: clickedChange},
            success:function(data) {
                if(data === "ok") {
                    alert("Heslo úspešne zmenené");
                    window.location.href="Account.php";
                } else {
                    $('#error').html(data);
                }
            }
        });
    }

</script>


</body>

</html>


