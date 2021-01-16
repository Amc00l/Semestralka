<?php
        include("../Server.php");
        if(isset($_SESSION["login"])) {
            unset($_SESSION["login"]);
        }
        header("Location: Login.php");
?>