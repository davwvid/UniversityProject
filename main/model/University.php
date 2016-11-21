<?php

class University
{
    protected $id;
    protected $name;
    protected $link;
    protected $description;
    protected $email;
    protected $password;
    protected $fkPricePackage;

    /**
     * Univerity constructor.
     * @param $id
     * @param $name
     * @param $link
     * @param $description
     * @param $email
     * @param $password
     * @param $fkPricePackage
     */
    public function __construct($id = null, $name = null, $link = null, $description = null, $email = null, $password = null, $fkPricePackage = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($name))
            $this->name = $name;
        if (isset($link))
            $this->link = $link;
        if (isset($description))
            $this->description = $description;
        if (isset($email))
            $this->email = $email;
        if (isset($password))
            $this->password = $password;
        if (isset($fkPricePackage))
            $this->fkPricePackage = $fkPricePackage;
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
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param null $link
     */
    public function setLink($link)
    {
        $this->link = $link;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return null
     */
    public function getFkPricePackage()
    {
        return $this->fkPricePackage;
    }

    /**
     * @param null $fkPricePackage
     */
    public function setFkPricePackage($fkPricePackage)
    {
        $this->fkPricePackage = $fkPricePackage;
    }

}