<?php

include '../dao/DAOFactory.php';

class UniversityController
{
    public function show()
    {

        $universities = DAOFactory::getUniversityDAO()->findAll();
        require_once('../view/showUniversity.php');
    }

    public function read()
    {

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        $courses = DAOFactory::getCourseDAO()->findAllByUniversity($university->getId());
        require_once('../view/readUniversity.php');
    }
}