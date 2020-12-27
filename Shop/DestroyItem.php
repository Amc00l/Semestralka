<?php

require_once "../View/View.php";
session_start();
$view = new View();
$id = $_POST["id"];
$view->removeFromCart($id);
$view->showCartItem();






