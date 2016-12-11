<?php

include_once "../model/University.php";

class UniversityValidator
{

    private $university;

    private $valid = true;
    private $linkError = null;
    private $descriptionError = null;
    private $emailError = null;

    public function __construct(University $university = null)
    {
        $this->university = $university;
        $this->validate();
    }

    public function validate()
    {

        if (!is_null($this->university)) {
            if (empty($this->university->getLink())) {
                $this->linkError = 'Please enter a link';
                $this->valid = false;
            }

            if (empty($this->university->getDescription())) {
                $this->descriptionError = 'Please enter a Description';
                $this->valid = false;
            }

            if (empty($this->university->getEmail())) {
                $this->emailError = 'Please enter an email';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;
    }

    /**
     * @return University
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return null
     */
    public function getLinkError()
    {
        return $this->linkError;
    }

    /**
     * @return null
     */
    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    /**
     * @return null
     */
    public function getEmailError()
    {
        return $this->emailError;
    }
}