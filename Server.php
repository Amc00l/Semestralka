<?php

    require "User.php";

    $con = mysqli_connect("localhost","root", "dtb456","persondata");

    if($con->connect_error) {
        die("Pripojenie sa nepodarilo: " . $con->connect_error);
    }



    session_start();


    $_SESSION['error'] = false;
    $_SESSION['array'] = array();

    if (isset($_POST['Registrovať'])) {

        $username = $_POST['username'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        //$pass= md5($pass);

        if (empty($_POST['username'])) {
            $_SESSION['error']  = true;
            array_push($_SESSION['array'],"Nezadali ste používateľské meno.");
        }

        if (empty($_POST['password'])) {
            $_SESSION['error'] = true;
            array_push($_SESSION['array'],"Nezadali ste heslo.");

        }


        if (empty($_POST['name'])) {
            $_SESSION['error'] = true;
            array_push($_SESSION['array'],"Nezadali ste meno.");

        }

        if (empty($_POST['surname'])) {
            $_SESSION['error'] = true;
            array_push($_SESSION['array'],"Nezadali ste priezvisko");

        }

        if (empty($_POST['email'])) {
            $_SESSION['error'] = true;
            array_push($_SESSION['array'],"Nezadali ste email");

        }


        if(!($_SESSION['error'])) {

            $user = new User($username,$pass,$name,$surname,$email);

            $sql = "insert into users(username, password, name, surname, email) values('$username','$pass','$name','$surname','$email')";

            if (!(mysqli_query($con, $sql))) {

                array_push($_SESSION['array'],"Takýto uživateľ už existuje");
            } else {
                $_SESSION['user'] = $user;
                $_SESSION['login'] = true;
                header('Location: Account.php');


            }
        }
    }


    if(isset($_POST['Prihlásiť'])) {
        $usernameLogin = $_POST['username'];
        $passLogin = $_POST['password'];



        if (empty($usernameLogin)) {
            $_SESSION['error']  = true;
            array_push($_SESSION['array'],"Nezadali ste používateľské meno.");
        }

        if (empty($passLogin)) {
            $_SESSION['error'] = true;
            array_push($_SESSION['array'],"Nezadali ste heslo.");

        }
        if(!($_SESSION['error'])) {

            $sqlSelectUser = "SELECT * FROM users WHERE username = '$usernameLogin' AND  password = '$passLogin'";
            $result= mysqli_query($con, $sqlSelectUser);

            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_row($result);

                $user = new User($row[1],$row[2],$row[3],$row[4],$row[5]);
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                header('Location: Account.php');

            } else {

                array_push($_SESSION['array'], "Používateľské meno a heslo sa nezhodujú.");
                $_SESSION['error'] = true;
            }

        }



    }

    if(isset($_POST['Zmenit'])) {
        $oldPass = $_POST['passOld'];
        $newPass = $_POST['passNew'];
        $conNewPas = $_POST['passConfirm'];

        $user = $_SESSION['user'];

        if(empty($oldPass)) {
            array_push($_SESSION['array'],"Nezadali ste staré heslo.");
            $_SESSION['error'] = true;

        }

        if(empty($newPass)) {
            array_push($_SESSION['array'],"Nezadali ste nové heslo.");
            $_SESSION['error'] = true;

        }

        if(empty($conNewPas)) {
            array_push($_SESSION['array'],"Nezadali ste heslo pre potvrdenie nového hesla.");
            $_SESSION['error'] = true;

        }

        if(!($_SESSION['error'])){
            if($_POST['passOld'] != $user->getPass()) {
                array_push($_SESSION['array'],"Nesprávne staré heslo.");
                $_SESSION['error'] = true;

            }

            if($_POST['passNew'] != $_POST['passConfirm']) {
                array_push($_SESSION['array'],"Nové heslá sa nezhodujú.");
                $_SESSION['error'] = true;

            }

            if(!($_SESSION['error'])) {
                $username = $user->getUsername();
                $sqlUpdatePass = "UPDATE users SET password='$newPass'  WHERE username = '$username'";
                $result = mysqli_query($con, $sqlUpdatePass);
                if($result) {
                    array_push($_SESSION['array'],"Heslo úspešne zmenené");
                }

            }
        }


    }


    if (isset($_POST['Delete'])) {
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $username = $user->getUsername();
            $sqlDeleteUser = "DELETE from users WHERE username='$username'";
            $result = mysqli_query($con, $sqlDeleteUser);
            if($result) {
                array_push($_SESSION['array'],"Používateľ zmazaný");
                session_unset();
                session_destroy();

                header('Location: Login.php');
            }
        }


    }





?>