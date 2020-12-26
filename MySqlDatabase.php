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


    public function SelectFromDatabaseForEshop($paIdModel){
        $sqlSelectEshopData = "SELECT model.nameModel as nameModel, listparts.idPart as idPart, listparts.partNumber as numberPart, listparts.price as price, listparts.locationImage as image, listparts.partName as part, listparts.text as text FROM model join listparts WHERE model.idModel = '$paIdModel'   AND  model.idModel = listparts.idModel";
        return $this->connection->query($sqlSelectEshopData);


    }

    public function Close() {
        mysqli_close($this->connection);
    }
}