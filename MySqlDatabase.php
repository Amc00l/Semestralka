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

    public function SelectExistUser($usernameLogin){
        $usernameLogin =$this->connection->real_escape_string($usernameLogin);
        $sqlSelectUser = "SELECT * FROM users WHERE username = '$usernameLogin'";
        return $result = mysqli_query($this->connection, $sqlSelectUser);
    }
    public function InsertToOffer($idModel,$idPart,$imageLocation) {
        $idPart =$this->connection->real_escape_string($idPart);
        $idModel = $this->connection->real_escape_string($idModel);
        $imageLocation = $this->connection->real_escape_string($imageLocation);
        $offer = "insert into offer(idModel, idPartNumber, imageLocation) values('$idModel','$idPart','$imageLocation')";
        return $result = mysqli_query($this->connection, $offer);
    }

    public function InsertNewItem($idPart, $partName,$Price,$Text) {
        $idPart =$this->connection->real_escape_string($idPart);
        $partName = $this->connection->real_escape_string($partName);
        $Price = $this->connection->real_escape_string($Price);
        $Text = $this->connection->real_escape_string($Text);
        $partList = "insert into partlist(idPart, partName, price, text) values('$idPart','$partName','$Price','$Text')";
        return $result = mysqli_query($this->connection, $partList);
    }

    public function checkInTablePartList($idPart) {
        $idPart =$this->connection->real_escape_string($idPart);
        $sqlCheck = "SELECT * FROM partlist WHERE idPart = '$idPart'";
        return $result =  mysqli_query($this->connection, $sqlCheck);
    }

    public function checkInTableOffer($idPart,$idModel) {
        $idPart =$this->connection->real_escape_string($idPart);
        $idModel = $this->connection->real_escape_string($idModel);
        $sqlCheck = "SELECT * FROM offer WHERE idPartNumber = '$idPart' AND  idModel ='$idModel'";
        return $result =  mysqli_query($this->connection, $sqlCheck);

    }

    public function SelectFromDatabaseForEshop($paIdModel){
        $paIdModel = $this->connection->real_escape_string($paIdModel);

        $sqlSelectEshopData = "SELECT model.nameModel as nameModel, model.idModel as modelId, partlist.idPart as idPart, partlist.price as price, offer.imageLocation as image, partlist.text as text, partlist.partName as part
                                FROM model
                                JOIN offer, partlist
                                WHERE model.idModel = '$paIdModel' AND  model.idModel = offer.idModel  AND offer.idPartNumber = partlist.idPart";
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