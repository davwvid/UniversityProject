<?php

include '../dao/DAOFactory.php';
include '../validator/UniversityValidator.php';

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

    public function update()
    {
        $university = new University();
        $universityValidator = new UniversityValidator();

        $id = $_SESSION['id'];

        if (!empty($_POST)) {
            $university = new University($id, $_POST['link'], $_POST['description'], $_POST['email']);
            $universityValidator = new UniversityValidator($university);

            if ($universityValidator->isValid()) {
                $university = DAOFactory::getUniversityDAO()->updateUniversity($university);
                return Route::call('Home', 'show');       //to where should it redirect???
            }
        } else {
            $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        }
        require_once('../view/updateUniversity.php');
    }
}