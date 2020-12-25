<?php


class MySqlDatabase
{
    public $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect("localhost","root", "dtb456","persondata");
        if($this->connection->connect_error) {
            die("Pripojenie sa nepodarilo: " .   $this->connection->connect_error);
        }

    }


    public function SelectFromDatabaseForEshop($paIdModel,$paPage){
        $sqlSelectEshopData = "SELECT model.nameModel as nameModel, listparts.idPart as idPart, listparts.partNumber as numberPart, listparts.price as price, listparts.locationImage as image, listparts.partName as part, listparts.text as text FROM model join listparts WHERE model.idModel = '$paIdModel' AND listparts.page = '$paPage'   AND  model.idModel = listparts.idModel";
        return $this->connection->query($sqlSelectEshopData);


    }

    public function Close() {
        mysqli_close($this->connection);
    }
}