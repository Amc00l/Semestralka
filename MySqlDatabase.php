<?php


class MySqlDatabase
{
    private $connection;
    private $host = "localhost";
    private $user = "root";
    private $pass = "dtb456";
    private $database = "persondata";


    public function __construct()
    {
        $this->connection = mysqli_connect($this->host,$this->user, $this->pass,$this->database);
        if($this->connection->connect_error) {
            die("Pripojenie sa nepodarilo: " .   $this->connection->connect_error);
        }

    }



    public function InsertNewUser($username,$pass,$name,$surname,$email) {
        $username =$this->connection->real_escape_string($username);
        $pass = $this->connection->real_escape_string($pass);
        $name = $this->connection->real_escape_string($name);
        $surname = $this->connection->real_escape_string($surname);
        $email = $this->connection->real_escape_string($email);
        return $sql = "insert into users(username, password, name, surname, email) values('$username','$pass','$name','$surname','$email')";


    }

    public function DeleteExistUser($username){
        $username =$this->connection->real_escape_string($username);
        $sqlDeleteUser = "DELETE from users WHERE username='$username'";
        return $result = mysqli_query($this->connection, $sqlDeleteUser);

    }
    public function UpdateChangePasswond($newPass,$username) {
        $username =$this->connection->real_escape_string($username);
        $newPass = $this->connection->real_escape_string($newPass);
        $sqlUpdatePass = "UPDATE users SET password='$newPass'  WHERE username = '$username'";
        return $result = mysqli_query($this->connection, $sqlUpdatePass);
    }
    public function SelectExistUser($usernameLogin,$passLogin){
        $usernameLogin =$this->connection->real_escape_string($usernameLogin);
        $passLogin =$this->connection->real_escape_string($passLogin);
        $sqlSelectUser = "SELECT * FROM users WHERE username = '$usernameLogin' AND  password = '$passLogin'";
        return $result = mysqli_query($this->connection, $sqlSelectUser);
    }


    public function SelectFromDatabaseForEshop($paIdModel){
        $sqlSelectEshopData = "SELECT model.nameModel as nameModel, model.idModel as modelId, listparts.idPart as idPart, listparts.partNumber as numberPart, listparts.price as price, listparts.locationImage as image, listparts.partName as part, listparts.text as text FROM model join listparts WHERE model.idModel = '$paIdModel'   AND  model.idModel = listparts.idModel";
        return $this->connection->query($sqlSelectEshopData);



    }

    public function Close() {
        mysqli_close($this->connection);
    }

    /**
     * @return false|mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }
}