<?php
require_once "../View/View.php";
require_once "../Controller.php";
session_start();
$view = new View();
Controller::destroySessionShoppingCart();
$view->showCartItem();


