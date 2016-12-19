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
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return $payed
     */
    public function getPayed()
    {
        return $this->payed;
    }

    /**
     * @param $payed
     */
    public function setPayed($payed)
    {
        $this->payed = $payed;
    }

    /**
     * @return $fkUniversity
     */
    public function getFkUniversity()
    {
        return $this->fkUniversity;
    }

    /**
     * @param $fkUniversity
     */
    public function setFkUniversity($fkUniversity)
    {
        $this->fkUniversity = $fkUniversity;
    }
}