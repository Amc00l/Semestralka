<?php
require_once "../Shop/Item.php";
class View
{
    public function __construct()
    {

    }

    public function headerRequimenets() { ?>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>

        <?php
    }

    public function showNavbar() { ?>
        <div class="logo">
            <a href="Home.php">
                <img src="../Pictures/ktm.jpg" alt="KtmLogo" class="Logo" width="100" height="100">
            </a>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-color">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class ="nav-item active ">
                        <a class="nav-link" href="../View/Home.php">Domov</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="../View/Models.php">Modely</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="../View/AboutAs.php">O nás</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="../View/Contact.php">Kontakt</a>
                    </li>
                    <li class ="nav-item active">
                        <a class="nav-link" href="../Shop/Shop.php">Eshop</a>
                    </li>

                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto"> <?php
                        if(isset($_SESSION["login"])) { ?>
                        <li class ="nav-item active">
                            <a class="nav-link" href="../User/Logout.php"><i class="fas fa-sign-out-alt" ></i> Logout</a>
                        </li>

                        <li class ="nav-item active ">
                            <a class="nav-link" href="../User/Account.php"><i class="fa fa-user" ></i> Účet</a>
                        </li> <?php } else { ?>

                        <li class ="nav-item active ">
                            <a class="nav-link" href="../User/Login.php"><i class="fas fa-sign-in-alt" ></i> Login</a>
                        </li>
                        <li class ="nav-item active">
                            <a class="nav-link" href="../User/Registration.php"><i class="far fa-registered" ></i>  Registrácia</a>
                        </li>
                        <li class ="nav-item active ">
                         <?php } ?>
                        <li class ="nav-item active ">
                            <a class="nav-link" href="../Shop/Cart.php">
                                <span><i class="fas fa-shopping-cart"></i></span>
                            </a>
                        </li>
                    </ul>
                </form>


            </div>
        </nav>

        <?php

    }

    public function getButtons($result) {
            return ceil(($result/itemOnPage));

    }

    public function showItems($result,$itemOnPage,$startIndex,$endIndex,$indexRow) {

        if ($result->num_rows > 0) {
            ?><div class="row"> <?php
            while($row = $result->fetch_assoc()) {

                if($itemOnPage < itemOnPage) {
                    if($indexRow >= $startIndex && $indexRow <= $endIndex) {?>

                            <div class="col-lg-4 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo$row["image"]?>">
                                    <div class="card-body">
                                        <h2 class="card-title"><?php echo $row["part"];?> <br> <?php echo $row["nameModel"];?> </h2>
                                        <h4><strong>Cena: <?php echo number_format($row["price"],2,',','');?> €</strong> </h4>
                                        <input type="button" class="btn btn-warning form-control" name="show" value="Zobraz popis" onclick="alert('<?php echo $row["text"] . " " .$row["nameModel"];?>');">
                                        <input type="hidden" id="partId<?php echo $row["idPart"];?>" name="partId<?php echo $row["idPart"];?>" value="<?php echo $row["idPart"];?>" />
                                        <input type="hidden" id="partPrice<?php echo $row["idPart"];?>" name="partPrice<?php echo $row["idPart"];?>" value="<?php echo $row["price"];?>" />
                                        <input type="hidden" id="modelId<?php echo $row["idPart"];?>" name="modelId<?php echo $row["idPart"];?>" value="<?php echo $row["modelId"];?>" />
                                        <input type="hidden" id="partName<?php echo $row["idPart"];?>" name="partName<?php echo $row["idPart"];?>" value="<?php echo $row["part"];?>" />
                                        <input type="text"  id="quantity<?php echo $row["idPart"];?>" name="quantity<?php echo $row["idPart"];?>"  class="form-control" value="1" />
                                        <input type="button" name="add_item_to_cart" id="<?php echo $row["idPart"];?>" class="btn btn-dark form-control add_item_to_cart" value="Pridať do košíka" />
                                    </div>
                                </div>
                            </div>

                        <?php

                    }
                }

                if($indexRow >= $startIndex) {
                    $itemOnPage++;
                }

                $indexRow++;
            }
            ?></div><?php



        }
    }



    public function showButtons($buttons,$model) {

        for($i = 0; $i < $buttons; $i++) {
            $val = $i+1; ?>
            <button type="button" class="btn btn-dark" value="<?php echo $val;?>"  onclick="loadPage(this.value,<?php echo $model ?>)"><?php echo $val;?></button>
            <?php

        }
    }
    public function showCartItem()  {
        if(isset($_SESSION["shoppingCart"])) {
            $totalPrice=0.0;
            foreach($_SESSION["shoppingCart"] as $item) {
                $totalPrice += $item->totalPrice();
                ?>
                <tr>
                    <th scope="row"><?php echo $item->getModel();?></th>
                    <td><?php echo $item->getName();?></td>
                    <td><?php echo number_format($item->getPrice(),2,',','');?></td>
                    <td><?php echo $item->getQuantity();?></td>
                    <td><?php echo number_format($item->getTotal(),2,',','');?></td>
                    <td><input type="button" name="remove_from_cart" id="<?php echo $item->getId();?>" class="btn btn-warning form-control remove_from_cart" value="Odstrániť" /></td>
                </tr>
                <?php
            }

            if(count($_SESSION["shoppingCart"]) > 0){
                ?>
                <td colspan="4">Celková suma</td>
                <td><?php echo number_format($totalPrice,2,',','');?></td>
                <td><input type="button" name="removeAll" id="removeAll" class="btn btn-danger form-control removeAll" value="Vyprázdniť košík" /></td>
                <?php
            } else {?>
                <td colspan="6">Košík je prázdny</td>
                <?php
            }

        } else { ?>
            <td colspan="6">Košík je prázdny</td>

             <?php
        }

    }

    public function showCreateButton() {?>
        <input type="button" name="createOrder" id="createOrder" class="btn btn-success createOrder" value="Vytvoriť objednávku" onclick="window.location.href='Order.php'"/><?php
    }

    public function showFooter(){?>
        <footer class="Pata">
            <p>Copyright 2020 ©</p>
        </footer>
        <?php
    }

    public function errors($param,$alert) {
         if($param) {
             if($alert) {
                 foreach($param as $errors) {
                     echo $errors;
                     echo "\n";

                 }


             } else {
                 foreach($param as $errors) {
                     echo $errors;
                     echo '<br>';
                 }
             }

         }
    }



}





