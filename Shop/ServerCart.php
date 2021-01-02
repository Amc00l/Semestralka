<?php
require_once "Item.php";
require_once "../Controller.php";
session_start();
$quantity = $_POST["quantity"];
$partName = $_POST["partName"];
$partPrice = $_POST["partPrice"];
$partId = $_POST["id"];
$paModel = $_POST["mod"];
$item = new Item($partId,$paModel,$partName,$partPrice,$quantity);
Controller::addToCart($partId,$quantity,$item);























































