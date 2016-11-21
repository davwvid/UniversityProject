<?php

class Invoice
{
    protected $id;
    protected $price;
    protected $type;
    protected $date;
    protected $fkUniversity;

    /**
     * Invoice constructor.
     * @param $id
     * @param $price
     * @param $type
     * @param $date
     * @param $fkUniversity
     */
    public function __construct($id = null, $price = null, $type = null, $date = null, $fkUniversity = null)
    {

        if (isset($id))
            $this->id = $id;
        if (isset($price))
            $this->price = $price;
        if (isset($type))
            $this->type = $type;
        if (isset($date))
            $this->date = $date;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param null $type
     */
    public function setType($type)
    {
        $this->type = $type;
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