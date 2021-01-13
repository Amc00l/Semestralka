<?php
require_once "../Controller.php";
session_start();
require_once "../View/View.php";
$view = new View();
$bool = Controller::isDestroyedShoppingCart();
if(!$bool) {
    $view->showCreateButton();
}

