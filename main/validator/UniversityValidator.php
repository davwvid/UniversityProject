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

    public function __construct(University $university = null)
    {
        $this->university = $university;
        $this->validate();
    }

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
            }

            if (empty($this->university->getFkPricePackage())) {
                $this->fkPricePackageError = 'Please enter a PricePackage';
                $this->valid = false;
            }

            $pricePackage = $this->university->getFkPricePackage();
            if (!empty($pricePackage) && ($pricePackage > 2 || $pricePackage < 0)) {
                $this->fkPricePackageError = 'Please enter a PricePackage 0, 1 or 2';
                $this->valid = false;
            }

        } else {
            $this->valid = false;
        }
        return $this->valid;
    }

    public function getUniversity()
    {
        return $this->university;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getNameError()
    {

        return $this->nameError;
    }

    public function getLinkError()
    {
        return $this->linkError;
    }

    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    public function getEmailError()
    {
        return $this->emailError;
    }

    public function getFkPricePackageError()
    {

        return $this->fkPricePackageError;
    }
}