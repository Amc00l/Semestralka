<?php
require_once "../View.php";
$view= new View();
include("../Server.php");

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Registrácia</title>
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
            <h1>Registrácia</h1>
            <form action="Registration.php" method="post" onsubmit="register(); return false;">
                <label> Prihlasovacie meno</label>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="LoginID" >
                </div>

                <label>Heslo</label>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" >

                </div>

                <label>Meno</label>
                <div class="form-group">
                    <input type="text" name="name"  id="name" class="form-control" placeholder="Name"  >
                </div>

                <label>Priezvisko</label>
                <div class="form-group">
                    <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" >
                </div>

                <label>Email</label>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                </div>

                <div class="form-group">
                    <input type="submit"  name="Registrovat" id="Registrovat" class="btn btn-dark" value="Registrovať">
                </div>
                <p>Máte už účet? <a href="Login.php">Prihlasiť</a> </p>


            </form>
            <div id="error">



            </div>

        </div>


    </div>
    <?php $view->showFooter(); ?>


    <script>





        function register() {
            var usr = $('#username').val();
            var pass = $('#password').val();
            var name =$('#name').val();
            var surname = $('#surname').val();
            var email = $('#email').val();
            var clickedRegister = "Registrovat";
            $.ajax({
                url:"../Server.php",
                method:"POST",
                data:{username: usr, password: pass, name: name, surname: surname, email: email, clickedRegister: clickedRegister},
                success:function(data)
                {
                    if(data === "ok") {
                        alert("Úspešne vytvorený účet");
                        window.location.href="Account.php";
                    } else {
                        $('#error').html(data);
                    }

                }
            });


        }
    </script>




</div>




</body>
</html>


