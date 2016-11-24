<?php

include '../dao/DAOFactory.php';

class CourseController
{
    public function show()
    {

        $courses = DAOFactory::getCourseDAO()->findAll();
        require_once('../view/showCourse.php');
    }
}