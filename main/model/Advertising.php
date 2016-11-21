<?php

class Advertising
{
    protected $id;
    protected $name;
    protected $date;
    protected $price;
    protected $fkUniversity;

    /**
     * Advertising constructor.
     * @param $id
     * @param $name
     * @param $date
     * @param $price
     * @param $fkUniversity
     */
    public function __construct($id = null, $name = null, $date = null, $price = null, $fkUniversity = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($name))
            $this->name = $name;
        if (isset($date))
            $this->date = $date;
        if (isset($price))
            $this->price = $price;
        if (isset($fkUniversity))
            $this->fkUniversity = $fkUniversity;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param null $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param null $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return null
     */
    public function getFkUniversity()
    {
        return $this->fkUniversity;
    }

    /**
     * @param null $fkUniversity
     */
    public function setFkUniversity($fkUniversity)
    {
        $this->fkUniversity = $fkUniversity;
    }

}