<?php

class PricePackage
{
    protected $id;
    protected $priceSub;
    protected $priceCourse;

    /**
     * PricePackage constructor.
     * @param $id
     * @param $priceSub
     * @param $priceCourse
     */
    public function __construct($id = null, $priceSub = null, $priceCourse = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($priceSub))
            $this->priceSub = $priceSub;
        if (isset($priceCourse))
            $this->priceCourse = $priceCourse;
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
    public function getPriceSub()
    {
        return $this->priceSub;
    }

    /**
     * @param null $priceSub
     */
    public function setPriceSub($priceSub)
    {
        $this->priceSub = $priceSub;
    }

    /**
     * @return null
     */
    public function getPriceCourse()
    {
        return $this->priceCourse;
    }

    /**
     * @param null $priceCourse
     */
    public function setPriceCourse($priceCourse)
    {
        $this->priceCourse = $priceCourse;
    }

}