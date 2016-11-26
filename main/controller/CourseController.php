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

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $course = DAOFactory::getCourseDAO()->readCourse($id);
        $university = DAOFactory::getUniversityDAO()->readUniversity($course->getFkUniversity());
        require_once('../view/readCourse.php');
    }
}