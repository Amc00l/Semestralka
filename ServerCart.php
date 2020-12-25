<?php
require_once "Item.php";

$quantity = $_POST["quantity"];
$partName = $_POST["partName"];
$partPrice = $_POST["partPrice"];
$partId = $_POST["id"];
$paModel = $_POST["model"];

session_start();

$item = new Item($partId,$paModel,$partName,$partPrice,$quantity);

if(!(isset($_SESSION["shoppingCart"]))) {
    $_SESSION["shoppingCart"] = array();

} else {
    array_push($_SESSION["shoppingCart"],$item);
}


foreach($_SESSION["shoppingCart"] as $value) {
    if($value->getId() == $partId) {
        $totalQuantity = $value->getQuantity() + $quantity;
        $value->setQuantity($totalQuantity);
        $value->totalPrice();

    }

}













































