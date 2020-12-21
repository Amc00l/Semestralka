<?php

    class Database {

        public $con;

        public function __construct() {

            $this->con = mysqli_connect("localhost","root", "dtb456","persondata");
                if($this->con->connect_error) {
                    die("Pripojenie sa nepodarilo: " . $this->con->connect_error);
                }

        }


        public function selectFromDatabaseForEshopParameters($paIdModel) {

            $sqlSelectEshopData = "SELECT model.nameModel as nameModel, listparts.price as price, listparts.locationImage as image, listparts.partName as part, listparts.text as text FROM model join listparts WHERE model.idModel = '$paIdModel' AND  model.idModel = listparts.idModel";
            $result = $this->con->query($sqlSelectEshopData);
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                   $source = $row["image"]
                    ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo$row["image"]?>">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row["part"]?> <br> <?php echo $row["nameModel"]?> </h2>
                                <h4>Cena: <?php echo $row["price"]?>€</h4>
                                <p class="card-text"><?php echo $row["text"]?></p>
                                <div class="col text-center bold">
                                    <button type="button" class="btn btn-dark">Vložiť do košíka</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php

                }
            }
        }
    }
