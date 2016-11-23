<?php

include '../dao/DAOFactory.php';

class CourseController
{
    public function show()
    {

        //$courses = DAOFactory::g()->findAll();
        require_once('../view/showCourse.php');
    }
}