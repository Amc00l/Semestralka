<?php
    require "MySqlDatabase.php";

    $mySql = new MySqlDatabase();
    $paPage = intval($_GET['page']);
    $paIdModel = intval($_GET['model']);
    $result = $mySql->SelectFromDatabaseForEshop($paIdModel,$paPage);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo$row["image"]?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row["part"]?> <br> <?php echo $row["nameModel"]?> </h2>
                        <h4>Cena: <?php echo $row["price"]?>€</h4>
                        <p class="card-text"><?php echo $row["text"]?></p>
                        <div class="col text-center bold">
                            <input type="submit"  name="Vlozit" class="btn btn-dark" value="Vlozit">
                        </div>

                    </div>
                </div>
            </div>
        <?php  }
    }

    $mySql->Close();



