<?php

include '../dao/DAOFactory.php';

class CourseController
{
    public function show()
    {

        $courses = DAOFactory::getCourseDAO()->findAll();
        require_once('../view/showCourse.php');
    }

    public function read()
    {

        $course = DAOFactory::getCourseDAO()->readCourse();
        require_once('../view/readCourse.php');
    }
}