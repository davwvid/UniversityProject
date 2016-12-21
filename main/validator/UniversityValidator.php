<?php

include_once "../model/University.php";

class UniversityValidator
{

    private $university;

    private $valid = true;
    private $nameError = null;
    private $linkError = null;
    private $descriptionError = null;
    private $emailError = null;
    private $fkPricePackageError = null;

    /**
     * UniversityValidator constructor.
     * @param University $university
     */
    public function __construct(University $university = null)
    {
        $this->university = $university;
        $this->validate();
    }

    /**
     * Validation
     */
    public function validate()
    {

        if (!is_null($this->university)) {

            if (empty($this->university->getName())) {
                $this->nameError = 'Please enter a Name';
                $this->valid = false;
            }

            if (empty($this->university->getLink())) {
                $this->linkError = 'Please enter a Link';
                $this->valid = false;
            }

            if (empty($this->university->getDescription())) {
                $this->descriptionError = 'Please enter a Description';
                $this->valid = false;
            }

            if (empty($this->university->getEmail())) {
                $this->emailError = 'Please enter an Email';
                $this->valid = false;
            } else {
                if (!filter_var($this->university->getEmail(), FILTER_VALIDATE_EMAIL)) {
                    $this->emailError = 'Please enter a valid Email';
                    $this->valid = false;
                }
            }

            if (empty($this->university->getFkPricePackage())) {
                $this->fkPricePackageError = 'Please enter a PricePackage';
                $this->valid = false;
            }

            $pricePackage = $this->university->getFkPricePackage();
            if (!empty($pricePackage) && ($pricePackage > 3 || $pricePackage < 1)) {
                $this->fkPricePackageError = 'Please enter a PricePackage 1, 2 or 3';
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
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return $nameError
     */
    public function getNameError()
    {

        return $this->nameError;
    }

    /**
     * @return $linkError
     */
    public function getLinkError()
    {
        return $this->linkError;
    }

    /**
     * @return $descriptionError
     */
    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    /**
     * @return $emailError
     */
    public function getEmailError()
    {
        return $this->emailError;
    }

    /**
     * @return $fkPricePackageError
     */
    public function getFkPricePackageError()
    {

        return $this->fkPricePackageError;
    }
}