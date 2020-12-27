<?php
require_once "Item.php";

session_start();

$quantity = $_POST["quantity"];
$partName = $_POST["partName"];
$partPrice = $_POST["partPrice"];
$partId = $_POST["id"];
$paModel = $_POST["mod"];

$item = new Item($partId,$paModel,$partName,$partPrice,$quantity);

if(!(isset($_SESSION["shoppingCart"]))) {
    $_SESSION["shoppingCart"] = array();
    array_push($_SESSION["shoppingCart"],$item);

} else {

    $isInside = false;
    foreach($_SESSION["shoppingCart"] as $value) {
        if($value->getId() == $partId) {
            $totalQuantity = $value->getQuantity() + $quantity;
            $value->setQuantity($totalQuantity);
            $value->totalPrice();
            $isInside = true;
        }

    }

    if($isInside == false) {
        array_push($_SESSION["shoppingCart"],$item);
    }

}






















































