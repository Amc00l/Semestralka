<?php


class View
{
    public function __construct()
    {
    }

    public function headerRequimenets() { ?>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <?php
    }

    public function navbarLoggedInUser() { ?>
        <div class="logo">
            <a href="Home.php">
                <img src="Pictures/ktm.jpg" alt="KtmLogo" class="Logo" width="100" height="100">
            </a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-color">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class ="nav-item active ">
                        <a class="nav-link" href="Home.php">Domov</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Models.php">Modely</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="AboutAs.php">O nás</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Contact.php">Kontakt</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Models.php">Eshop</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class ="nav-item active ">
                            <a class="nav-link" href="Account.php"><i class="fas fa-user"></i>  Účet</a>

                        </li>
                        <li class ="nav-item active">
                            <a class="nav-link" href="Logout.php"><i class="fas fa-sign-out-alt" ></i> Logout</a>
                        </li>
                    </ul>
                </form>


            </div>
        </nav>

        <?php

    }



    public function navbarLoggedOutUser() { ?>
        <div class="logo">
            <a href="Home.php">
                <img src="Pictures/ktm.jpg" alt="KtmLogo" class="Logo" width="100" height="100">
            </a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-color">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class ="nav-item active ">
                        <a class="nav-link" href="Home.php">Domov</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Models.php">Modely</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="AboutAs.php">O nás</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Contact.php">Kontakt</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="Models.php">Eshop</a>
                    </li>

                </ul>


                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class ="nav-item active ">
                            <a class="nav-link" href="Login.php"><i class="fas fa-sign-in-alt" ></i> Login</a>
                        </li>
                        <li class ="nav-item active">
                            <a class="nav-link" href="Registration.php"><i class="far fa-registered" ></i>  Registrácia</a>
                        </li>
                    </ul>
                </form>


            </div>
        </nav>

        <?php

    }

    public function destroySesion() {

        session_unset();
        session_destroy();
        $_SESSION['login'] = false;
        header('Location: Login.php');

    }



    public function errors($param) {
         if($param) {
            foreach($param as $errors) {
                echo $errors;
                echo '<br>';
            }
         }
    }



}





