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

    /**
     * CourseValidator constructor.
     * @param Course $course
     */
    public function __construct(Course $course = null)
    {
        $this->course = $course;
        $this->validate();
    }

    /**
     * Validation
     */
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

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
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
     * @return $shortDescriptionError
     */
    public function getShortDescriptionError()
    {
        return $this->shortDescriptionError;
    }

    /**
     * @return $descriptionError
     */
    public function getDescriptionError()
    {
        return $this->descriptionError;
    }

    /**
     * @return $expirationDateError
     */
    public function getExpirationDateError()
    {
        return $this->expirationDateError;
    }
}