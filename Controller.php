<?php
require_once "User/User.php";
require_once "View/View.php";

class Controller
{

    public static function addToCart($partId,$quantity,$item) {

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
    }

    public static function checkConfirm($name, $surname, $address, $address2, $city, $zip, $country, $selected, $check) {
        $view = new View();
        if (empty($name)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste meno.");
        }
        if (empty($surname)) {
            $_SESSION["error"]= true;
            array_push($_SESSION["array"],"Nezadali ste priezvisko.");
        }
        if (empty($address)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste obec.");
        }
        if (empty($address2)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste ulicu.");
        }
        if (empty($city)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste mesto.");
        }
        if (empty($zip)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste psč.");
        }
        if (empty($country)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste štát.");
        }

        if($selected === "Vybrať...") {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nevybrali ste dopravu.");
        }

        if(!($_SESSION["error"])) {

            if(strlen($zip) != 5){
                array_push($_SESSION["array"],"Zlý format PSČ.");
            } else {
                if($check === " ") {
                    array_push($_SESSION["array"],"Nezačiarkli ste súhlas so spracovaním požiadaviek.");
                } else {
                    self::destroySessionShoppingCart();
                    echo "ok";

                }

            }
            $view->errors($_SESSION["array"],true);

        } else {

            $view->errors($_SESSION["array"],true);
        }






    }



    public static function destroySessionShoppingCart() {
        if (isset($_SESSION["shoppingCart"])){
            unset($_SESSION["shoppingCart"]);
        }
    }

    public static function isDestroyedShoppingCart() {
       if(isset($_SESSION["shoppingCart"])) {
           return false;
       }
       return true;

    }
    public static function removeFromCart($id) {
        if(isset($_SESSION["shoppingCart"])) {
            foreach($_SESSION["shoppingCart"] as $key => $item) {
                if($item->getId() == $id) {
                    unset($_SESSION["shoppingCart"][$key]);
                }
            }
        }

    }

    public static function checkRegister($con,$username,$pass,$name,$surname,$email){
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $view = new View();
        if (empty($username)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste používateľské meno.");
        }
        if (empty($pass)) {
            $_SESSION["error"]= true;
            array_push($_SESSION["array"],"Nezadali ste heslo.");
        }
        if (empty($name)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste meno.");
        }
        if (empty($surname)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste priezvisko");
        }
        if (empty($email)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste email");
        }

        if(!($_SESSION["error"])) {
            $user = new User($username, $pass, $name, $surname, $email);
            $sql = $con->InsertNewUser($username,$pass,$name,$surname,$email);
            if (!(mysqli_query($con->getConnection(), $sql))) {
                array_push($_SESSION["array"],"Takýto uživateľ už existuje");
                $view->errors($_SESSION["array"],false);

            } else {
                $_SESSION["user"] = $user;
                $_SESSION["login"] = true;
                echo "ok";


            }


        } else {

            $view->errors($_SESSION["array"],false);


        }
    }

    public static function checkLogin($con,$usernameLogin,$passLogin) {
        $view = new View();
        if(empty($usernameLogin)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste používateľské meno.");
        }
        if (empty($passLogin)) {
            $_SESSION["error"] = true;
            array_push($_SESSION["array"],"Nezadali ste heslo.");

        }

        if(!($_SESSION["error"])) {
            $result= $con->SelectExistUser($usernameLogin);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_row($result);
                if(password_verify($passLogin, $row[2])) {
                    $user = new User($row[1],$row[2],$row[3],$row[4],$row[5]);
                    $_SESSION["login"] = true;
                    $_SESSION["user"] = $user;
                    echo "ok";
                } else {
                    array_push($_SESSION["array"], "Používateľské meno a heslo sa nezhodujú.");
                    $_SESSION["error"] = true;
                    $view->errors($_SESSION["array"],false);
                }
            } else {
                array_push($_SESSION["array"], "Takýto užívateľ v databáze neexistuje.");
                $_SESSION["error"] = true;
                $view->errors($_SESSION["array"],false);
            }

        } else {
            $view->errors($_SESSION["array"],false);
        }
    }

    public static function checkChange($con,$oldPass,$newPass,$conNewPas)
    {
        $view = new View();
        $user = $_SESSION["user"];
        if (empty($oldPass)) {
            array_push($_SESSION["array"], "Nezadali ste staré heslo.");
            $_SESSION["error"] = true;
        }
        if (empty($newPass)) {
            array_push($_SESSION["array"], "Nezadali ste nové heslo.");
            $_SESSION["error"] = true;
        }
        if (empty($conNewPas)) {
            array_push($_SESSION["array"], "Nezadali ste heslo pre potvrdenie nového hesla.");
            $_SESSION["error"] = true;
        }
        if(!empty($oldPass)) {
            if($oldPass == $newPass){
                array_push($_SESSION["array"], "Nové heslo je identické so starým.");
                $_SESSION["error"] = true;
            }
        }


        if (!($_SESSION["error"])) {
            if (!(password_verify($oldPass, $user->getPass()))) {
                array_push($_SESSION["array"], "Nesprávne staré heslo.");
                $_SESSION["error"] = true;
            }
            if ($newPass != $conNewPas) {
                array_push($_SESSION["array"], "Nové heslá sa nezhodujú.");
                $_SESSION["error"] = true;
            }
            if (!($_SESSION["error"])) {
                $newPass = password_hash($newPass, PASSWORD_DEFAULT);
                $username = $user->getUsername();
                $result = $con->UpdateChangePasswond($newPass, $username);
                if ($result) {
                    $user->setPass($newPass);
                    echo "ok";
                }

            } else {
                $view->errors($_SESSION["array"],false);
            }
        } else {
            $view->errors($_SESSION["array"],false);
        }


    }

    public static function addItem($con,$idPart,$partName,$price,$text,$idModel,$imageLocation)
    {
        $view = new View();
        if (empty($idPart)) {
            array_push($_SESSION["array"], "Nezadali ste číslo dielu.");
            $_SESSION["error"] = true;
        }
        if (empty($partName)) {
            array_push($_SESSION["array"], "Nezadali ste názov dielu.");
            $_SESSION["error"] = true;
        }
        if (empty($price)) {
            array_push($_SESSION["array"], "Nezadali ste cenu.");
            $_SESSION["error"] = true;
        }

        if (empty($text)) {
            array_push($_SESSION["array"], "Nezadali ste text položky.");
            $_SESSION["error"] = true;
        }
        if (empty($idModel)) {
            array_push($_SESSION["array"], "Nezadali ste text položky.");
            $_SESSION["error"] = true;
        }

        if (empty($imageLocation)) {
            array_push($_SESSION["array"], "Nezadali ste adresu obrázku.");
            $_SESSION["error"] = true;
        }


        if (!($_SESSION["error"])) {
            $result = $con->checkInTablePartList($idPart);
            if ($result->num_rows == 0) {
                $con->InsertNewItem($idPart, $partName, $price, $text);
                $result = $con->checkInTableOffer($idPart, $idModel);
                if ($result->num_rows == 0) {
                    $result = $con->InsertToOffer($idModel, $idPart, $imageLocation);
                    if ($result) {
                        echo "ok";
                    } else {
                        array_push($_SESSION["array"], "Nepodarilo sa vložit do databázy.");
                        $view->errors($_SESSION["array"], true);
                    }
                }
            } else {
                $result = $con->checkInTableOffer($idPart, $idModel);
                if($result->num_rows == 0) {
                    $result = $con->InsertToOffer($idModel, $idPart, $imageLocation);
                    if($result) {
                        echo "ok";
                    } else {
                        array_push($_SESSION["array"], "Takýto model neexistuje.");
                        $view->errors($_SESSION["array"], true);
                    }
                } else {
                    array_push($_SESSION["array"], "Takáto položka už existuje.");
                    $view->errors($_SESSION["array"], true);


                }




            }
        } else {
            $view->errors($_SESSION["array"], true);
        }





    }


    public function deleteUser($con){
        $user = $_SESSION["user"];
        $username = $user->getUsername();
        $result = $con->DeleteExistUser($username);
        if($result) {
            ?> <script> alert("Používateľ zmazaný");</script><?php
            unset($_SESSION["user"]);
            unset($_SESSION["error"]);
            unset($_SESSION["array"]);
            unset($_SESSION["login"]);
            header("Location: Login.php");
        }

    }

}