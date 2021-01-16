<?php
    require_once "User/User.php";
    require_once "MySqlDatabase.php";
    require_once "Controller.php";
    require_once "Shop/Item.php";

    $con = new MySqlDatabase();
    const itemOnPage = 6;
    $view = new View();
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

    if(isset($_POST["clickedAddToCart"])) {
        $quantity = $_POST["quantity"];
        $partName = $_POST["partName"];
        $partPrice = $_POST["partPrice"];
        $partId = $_POST["id"];
        $paModel = $_POST["mod"];
        $item = new Item($partId,$paModel,$partName,$partPrice,$quantity);
        Controller::addToCart($partId,$quantity,$item);

    }

    if(isset($_POST["clickedRemoveItem"])) {
        Controller::removeFromCart($_POST["id"]);
        $view->showCartItem();
        if(empty($_SESSION["shoppingCart"])) {
            Controller::destroySessionShoppingCart();
        }

    }

    if(isset($_POST["clickedRemoveAll"])) {
        Controller::destroySessionShoppingCart();
        $view->showCartItem();
    }

    if(isset($_POST["clickedCreateOrder"])) {
        $bool = Controller::isDestroyedShoppingCart();
        if(!$bool) {
            $view->showCreateButton();
        }
    }

    if(isset($_POST["clickedLoad"])) {
        if(isset($_POST["model"])){
            $_SESSION["paModel"] = $_POST["model"];
            $paIdModel = $_SESSION["paModel"];
        } else {
            $paIdModel = $_SESSION["paModel"];
        }
        Controller::loadItems($con,$_POST["page"],$paIdModel,itemOnPage,$view);
    }
    $con->Close();



?>