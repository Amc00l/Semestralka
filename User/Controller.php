<?php
require_once "../User/User.php";
require_once "../View/View.php";
class Controller
{

    public static function checkRegister($con,$username,$pass,$name,$surname,$email){
        //$pass= md5($pass);
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
                $view->errors($_SESSION["array"]);

            } else {
                $_SESSION["user"] = $user;
                $_SESSION["login"] = true;
                echo "ok";


            }


        } else {

            $view->errors($_SESSION["array"]);


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
            $result= $con->SelectExistUser($usernameLogin,$passLogin);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_row($result);
                $user = new User($row[1],$row[2],$row[3],$row[4],$row[5]);
                $_SESSION["login"] = true;
                $_SESSION["user"] = $user;
                echo "ok";
            } else {
                array_push($_SESSION["array"], "Používateľské meno a heslo sa nezhodujú.");
                $_SESSION["error"] = true;
                $view->errors($_SESSION["array"]);
            }


        } else {
            $view->errors($_SESSION["array"]);

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
        if (!($_SESSION['error'])) {
            if ($_POST['passOld'] != $user->getPass()) {
                array_push($_SESSION["array"], "Nesprávne staré heslo.");
                $_SESSION['error'] = true;
            }
            if ($_POST['passNew'] != $_POST['passConfirm']) {
                array_push($_SESSION["array"], "Nové heslá sa nezhodujú.");
                $_SESSION['error'] = true;
            }
            if (!($_SESSION['error'])) {
                $username = $user->getUsername();
                $result = $con->UpdateChangePasswond($newPass, $username);
                if ($result) {
                    $user->setPass($_POST['passNew']);
                    echo "ok";
                }

            } else {

                $view->errors($_SESSION["array"]);

            }
        } else {

            $view->errors($_SESSION["array"]);
        }


    }

    public function deleteUser($con){
        $view = new View();
        $user = $_SESSION["user"];
        $username = $user->getUsername();
        $result = $con->DeleteExistUser($username);
        if($result) {
            array_push($_SESSION["array"],"Používateľ zmazaný");
            ?> <script> alert("Používateľ zmazaný");</script><?php
            unset($_SESSION["user"]);
            unset($_SESSION["error"]);
            unset($_SESSION["array"]);
            unset($_SESSION["login"]);
            header("Location: Login.php");
        }



    }

}