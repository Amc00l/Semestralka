<?php
include('Server.php');
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
require "View.php";
$view = new View();

$con = mysqli_connect("localhost","root", "dtb456","persondata");

if($con->connect_error) {
    die("Pripojenie sa nepodarilo: " . $con->connect_error);
}


//"SELECT  FROM model WHERE username = '$usernameLogin' AND  password = '$passLogin'";

$sql = "SELECT model.nameModel as nameModel, listparts.partName as part   FROM model join listparts WHERE model.idModel = 125 AND  model.idModel = listparts.idModel";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["nameModel"]. " - Name: " . $row["part"]. "<br>";
    }
} else {
    echo "0 results";
}
$con->close();

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <title>Shop</title>
    <?php
    $view->headerRequimenets();

    ?>


</head>

<body>
<div class="BackGround">

    <?php
    if(isset($_SESSION['login'])) {
        $view->navbarLoggedInUser();

    } else {
        $view->navbarLoggedOutUser();
    }

    ?>

    <div class="Obsah">
        <div class="Text">

            <h1>Položky</h1>

            <div class="row">

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/Engine125.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Motor <br> KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Motor určený pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/Transmision.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Prevodový hriadeľ <br>KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Hriadeľ určený pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/carburator125.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Karburátor <br>KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Karburátor určený pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/Pipe125.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Vykonostník<br>KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Koleno určené pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/Exhaust125.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Výfuk <br>KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Koncovka určená pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="Pictures/RozetaALL.jpg">
                        <div class="card-body">
                            <h2 class="card-title">Rozeta <br>KTM 125SX</h2>
                            <h4>Cena: 965,08 €</h4>
                            <p class="card-text">Rozeta určená pre model SX125</p>
                            <div class="col text-center bold">
                                <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center">
                <button type="button" class="btn btn-dark"><<</button>
                <button type="button" class="btn btn-dark">>></button>
            </div>

        </div>






    </div>



    <footer class="Pata">
        <p>Copyright 2020 ©</p>

    </footer>


</div>



</body>
</html>

