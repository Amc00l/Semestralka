<?php
require_once "../View/View.php";
require_once "../Controller.php";
session_start();
$view = new View();
$id = $_POST["id"];
Controller::removeFromCart($id);
$view->showCartItem();
if(empty($_SESSION["shoppingCart"])) {
    Controller::destroySessionShoppingCart();
}







