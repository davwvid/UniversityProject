<?php

class Invoice
{
    protected $id;
    protected $price;
    protected $date;
    protected $comment;
    protected $payed;
    protected $fkUniversity;

    /**
     * Invoice constructor.
     * @param $id
     * @param $price
     * @param $date
     * @param $comment
     * @param $payed
     * @param $fkUniversity
     */
    public function __construct($id = null, $price = null, $date = null, $comment = null, $payed = null, $fkUniversity = null)
    {

        if (isset($id))
            $this->id = $id;
        if (isset($price))
            $this->price = $price;
        if (isset($date))
            $this->date = $date;
        if (isset($comment))
            $this->comment = $comment;
        if (isset($payed))
            $this->payed = $payed;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param null $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * @param null $payed
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;
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