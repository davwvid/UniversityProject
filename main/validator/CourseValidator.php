<?php

include_once "../model/Course.php";

class CourseValidator
{

    private $course;

    private $valid = true;
    private $nameError = null;
    private $shortDescriptionError = null;
    private $descriptionError = null;
    private $expirationDateError = null;

    public function __construct(Course $course = null)
    {
        $this->course = $course;
        $this->validate();
    }

    public function validate()
    {

        if (!is_null($this->course)) {
            if (empty($this->course->getName())) {
                $this->nameError = 'Please enter a Name';
                $this->valid = false;
            }

            if (empty($this->course->getShortDescription())) {
                $this->shortDescriptionError = 'Please enter a Short Description';
                $this->valid = false;
            }

            if (empty($this->course->getDescription())) {
                $this->descriptionError = 'Please enter a Description';
                $this->valid = false;
            }

            if (empty($this->course->getExpirationDate())) {
                $this->expirationDateError = 'Please enter an Expiration Date';
                $this->valid = false;
            }
        } else {
            $this->valid = false;
        }
        return $this->valid;

    }

    public function getCourse()
    {
        return $this->course;
    }

    public function isValid()
    {
        return $this->valid;
    }

    public function getNameError()
    {
        return $this->nameError;
    }

    public function getShortDescriptionError()
    {
        return $this->shortDescriptionError;
    }

    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    public function getExpirationDateError()
    {
        return $this->expirationDateError;
    }
}