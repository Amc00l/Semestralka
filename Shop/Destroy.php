<?php
require_once "../View/View.php";
session_start();
$view = new View();
$view->destroySesion();
$view->showCartItem();

