<?php
    require_once "User.php";
    require_once "../MySqlDatabase.php";
    require_once "../Controller.php";

    $con = new MySqlDatabase();

    session_start();

    $_SESSION["error"] = false;
    $_SESSION["array"] = array();

    if(isset($_POST["clickedConfirm"])) {
        Controller::checkConfirm($_POST["name"],$_POST["surname"],$_POST["address"],$_POST["address2"],$_POST["city"],$_POST["zip"],$_POST["country"],$_POST["selected"],$_POST["aggre"]);
    }

    if(isset($_POST["clickedRegister"])) {
        Controller::checkRegister($con, $_POST["username"],$_POST["password"],$_POST["name"],$_POST["surname"],$_POST["email"]);

    }

    if(isset($_POST["clickedLogin"])) {
        Controller::checkLogin($con,$_POST["username"],$_POST["password"]);
    }

    if(isset($_POST["clickedChange"])) {
        Controller::checkChange($con,$_POST["passOld"],$_POST["passNew"],$_POST["passConfirm"]);

    }


    if (isset($_POST["Delete"])) {
        Controller::deleteUser($con);

    }

    if(isset($_POST["clickedAdd"])) {
        Controller::addItem($con,$_POST["idPart"],$_POST["PartName"],$_POST["Price"],$_POST["Text"],$_POST["Model"],$_POST["Location"]);
    }

    $con->Close();



?>