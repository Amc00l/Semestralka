<?php
    require "MySqlDatabase.php";
    $mySql = new MySqlDatabase();
    $paPage =intval($_POST['page']);
    $paIdModel = intval($_POST['model']);
    $result = $mySql->SelectFromDatabaseForEshop($paIdModel);

    $itemOnPage = 0;
    $buttons = ceil($result->num_rows / 6);
    if ($result->num_rows > 0) {

        while($itemOnPage < 6) {
            $row = $result->fetch_assoc();
            ?>

            <div class="col-lg-4 mb-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo$row["image"]?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row["part"];?> <br> <?php echo $row["nameModel"];?> </h2>
                        <h4>Cena: <?php echo $row["price"];?>€</h4>
                        <p class="card-text"><?php echo $row["text"];?></p>
                        <input type="hidden" id="partId<?php echo $row["idPart"];?>" name="partId<?php echo $row["idPart"];?>" value="<?php echo $row["idPart"];?>" />
                        <input type="hidden" id="partPrice<?php echo $row["idPart"];?>" name="partPrice<?php echo $row["idPart"];?>" value="<?php echo $row["price"];?>" />
                        <input type="hidden" id="partName<?php echo $row["idPart"];?>" name="partName<?php echo $row["idPart"];?>" value="<?php echo $row["part"];?>" />
                        <input type="text"  id="quantity<?php echo $row["idPart"];?>" name="quantity<?php echo $row["idPart"];?>"  class="form-control" value="1" />
                        <input type="button" name="add_item_to_cart" id="<?php echo $row["idPart"];?>" class="btn btn-dark form-control add_item_to_cart" value="Pridať do košíka" />
                    </div>


                </div>
            </div>

            <?php


            $itemOnPage++;

        }
        for($i = 0; $i < $buttons; $i++) {
            $val = $i+1; ?>

            <button type="button" class="btn btn-dark justify-content-center" value="<?php echo $val ?>"  onclick="loadPage(this.value)"><?php echo $val ?></button>

            <?php

        }
    }

    $mySql->Close();


?>


