<?php

class Course
{
    protected $id;
    protected $name;
    protected $shortDescription;
    protected $description;
    protected $expirationDate;
    protected $fkUniversity;

    /**
     * Course constructor.
     * @param $id
     * @param $name
     * @param $shortDescription
     * @param $description
     * @param $expirationDate
     * @param $fkUniversity
     */
    public function __construct($id = null, $name = null, $shortDescription = null, $description = null, $expirationDate = null, $fkUniversity = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($name))
            $this->name = $name;
        if (isset($shortDescription))
            $this->shortDescription = $shortDescription;
        if (isset($description))
            $this->description = $description;
        if (isset($expirationDate))
            $this->expirationDate = $expirationDate;
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
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param null $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @param null $expirationDate
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
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