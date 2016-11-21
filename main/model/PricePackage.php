<?php

class PricePackage
{
    protected $id;
    protected $name;
    protected $price;

    /**
     * PricePackage constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($id = null, $name = null, $price = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($name))
            $this->name = $name;
        if (isset($price))
            $this->price = $price;
    }

}