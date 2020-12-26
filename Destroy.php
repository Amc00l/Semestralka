<?php
require_once "View.php";
session_start();
$view = new View();
$view->destroySesion();
$view->showCartItem();

