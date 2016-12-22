<?php

require_once '../dao/DAOFactory.php';
include '../validator/UniversityValidator.php';
include '../controller/CommonController.php';
include '../controller/InvoiceController.php';

class UniversityController
{
    /**
     * This method shows the list of all universities
     */
    public function show()
    {

        $search = '';

        if ($_POST) {
            $search = $_POST['search'];
        }

        $universities = DAOFactory::getUniversityDAO()->findAll();
        require_once('../view/showUniversity.php');
    }

    /**
     * This method shows the list of all universities (admin view)
     */
    public function showAll()
    {
        if (isset($_SESSION['loggedIn']) && isset($_SESSION['admin'])) {

            $universities = DAOFactory::getUniversityDAO()->findAll();

            require_once('../view/manageAllUniversity.php');
        } else {
            require_once('../view/home.php');
        }
    }

    /**
     * This method creates a new university as well as a invoice and sends it to the costumer
     */
    public function create()
    {
        $university = new University();
        $universityValidator = new UniversityValidator();

        if (!empty($_POST)) {

            $newPassword = CommonController::generateRandomString();
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

            $university = new University(null, $_POST['name'], $_POST['link'], $_POST['description'], $_POST['email'], $hashed_password, $_POST['pricePackage']);
            $universityValidator = new UniversityValidator($university);

            if ($universityValidator->isValid()) {
                $university = DAOFactory::getUniversityDAO()->createUniversity($university);
                InvoiceController::create("sub", $university, $newPassword);
                return Route::call('University', 'showAll');
            }
        }
        require_once('../view/createUniversity.php');
    }

    /**
     * This method shows one specific university
     */
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

    /**
     * This method shows a message if the university should really be deleted
     */
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

    /**
     * This method deletes the selected university
     */
    public function delete()
    {
        if (!empty($_POST)) {

            DAOFactory::getUniversityDAO()->deleteUniversity(new University($_POST['id']));
        }

        return Route::call('University', 'showAll');
    }

    /**
     * This method updates a university (admin view)
     */
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

    /**
     * This method updates a university (user view)
     */
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