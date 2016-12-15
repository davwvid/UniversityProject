<?php

include '../dao/DAOFactory.php';
include '../validator/UniversityValidator.php';
include '../controller/CommonController.php';
include '../controller/InvoiceController.php';

class UniversityController
{
    public function show()
    {

        $universities = DAOFactory::getUniversityDAO()->findAll();
        require_once('../view/showUniversity.php');
    }

    public function showAll()
    {
        if (isset($_SESSION['loggedIn']) && isset($_SESSION['admin'])) {

            $universities = DAOFactory::getUniversityDAO()->findAll();

            require_once('../view/manageAllUniversity.php');
        } else {
            require_once('../view/home.php');
        }
    }

    public function create()
    {
        $university = new University();
        $universityValidator = new UniversityValidator();

        if (!empty($_POST)) {

            $newPassword = CommonController::generateRandomString();
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

            $university = new University(null, $_POST['name'], $_POST['link'], $_POST['description'], $_POST['email'], $hashed_password, 0);
            $universityValidator = new UniversityValidator($university);

            if ($universityValidator->isValid()) {
                $university = DAOFactory::getUniversityDAO()->createUniversity($university);
                InvoiceController::create("sub", $university);
                return Route::call('University', 'showAll');
            }
        }
        require_once('../view/createUniversity.php');
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

    public function deleteAsk()
    {
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        require_once('../view/deleteUniversity.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {

            DAOFactory::getUniversityDAO()->deleteUniversity(new University($_POST['id']));
        }

        return Route::call('University', 'showAll');
    }

    public function update()
    {
        $university = new University();
        $universityValidator = new UniversityValidator();

        $id = null;
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }

        if (!empty($_POST)) {
            $university = new University($id, $_POST['name'], $_POST['link'], $_POST['description'], $_POST['email'], $_POST['password'], $_POST['pricePackage']);
            $universityValidator = new UniversityValidator($university);

            if ($universityValidator->isValid()) {
                $university = DAOFactory::getUniversityDAO()->updateUniversity($university);
                return Route::call('University', 'showAll');
            }
        } else {
            $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        }

        require_once('../view/updateUniversity.php');
    }

    public function updateMine()
    {
        $university = new University();
        $universityValidator = new UniversityValidator();

        $id = $_SESSION['id'];

        if (!empty($_POST)) {
            $university = new University($id, $_POST['name'], $_POST['link'], $_POST['description'], $_POST['email'], $_POST['password'], intval($_POST['pricePackage']));
            $universityValidator = new UniversityValidator($university);

            if ($universityValidator->isValid()) {
                $university = DAOFactory::getUniversityDAO()->updateUniversity($university);
                return Route::call('University', 'show');
            }
        } else {
            $university = DAOFactory::getUniversityDAO()->readUniversity($id);
        }

        require_once('../view/manageMyUniversity.php');
    }
}