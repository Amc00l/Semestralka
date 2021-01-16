<?php
require_once "../View.php";
$view= new View();
include("../Server.php");

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Prihlasenie</title>
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
            <h1>Prihlasenie</h1>

            <form method="post" onsubmit="login();return false;">
                <label>Prihlasovacie meno</label>
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="LoginID">
                </div>

                <label>Heslo</label>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                    <input type="submit"  id="Prihlasit" name="Prihlásiť" class="btn btn-dark" value="Prihlásiť">

            </form>
                <div id="error">



                </div>

        </div>

    </div>
    <?php $view->showFooter(); ?>

</div>

<script>
           function login() {
                var usr = $('#username').val();
                var pass = $('#password').val();
                var clickedLogin = "Prihlasit";
                $.ajax({
                    url:"../Server.php",
                    method:"POST",
                    data:{username: usr, password: pass, clickedLogin: clickedLogin},
                    success:function(data)
                    {
                        if(data === "ok") {
                            alert("Úspešne prihlásený");
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


