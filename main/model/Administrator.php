<?php

class Administrator
{
    protected $id;
    protected $email;
    protected $password;

    /**
     * Administrator constructor.
     * @param $id
     * @param $email
     * @param $password
     */
    public function __construct($id = null, $email = null, $password = null)
    {
        if (isset($id))
            $this->id = $id;
        if (isset($email))
            $this->email = $email;
        if (isset($password))
            $this->password = $password;
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


}