<?php


class Item
{
    private $id;
    private $model;
    private $quantity;
    private $price;
    private $name;
    private $total;

    public function __construct($paId,$paModel, $paName, $paPrice, $paQuantity)
    {
        $this->id = $paId;
        $this->model = $paModel;
        $this->quantity = $paQuantity;
        $this->price = $paPrice;
        $this->name =$paName;
        $this->total = 0.0;
    }

    public function totalPrice() {
        $this->total = $this->quantity * $this->price;
        return $this->total;
    }
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }


}