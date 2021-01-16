<?php
    require_once "../MySqlDatabase.php";
    require_once "../View/View.php";
    session_start();
    $view = new View();
    $mySql = new MySqlDatabase();
    $paPage =intval($_POST["page"]);
    const itemOnPage = 6;

    if(isset($_POST["model"])){
        $_SESSION["paModel"] = $_POST["model"];
        $paIdModel = $_SESSION["paModel"];
    } else {
        $paIdModel = $_SESSION["paModel"];
    }
    $result = $mySql->SelectFromDatabaseForEshop($paIdModel);
    $numRows = $result->num_rows;
    $buttons = $view->getButtons($numRows);
    $endIndex = $paPage*itemOnPage;
    $startIndex = $endIndex-itemOnPage;
    $indexRow = 0;
    $itemOnPage = 0;
    $view->showItems($result,$itemOnPage,$startIndex,$endIndex,$indexRow);
    $view->showButtons($buttons,$paIdModel);
    $mySql->Close();
?>


