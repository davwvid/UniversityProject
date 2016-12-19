<?php

include '../dao/DAOFactory.php';
include '../validator/CourseValidator.php';
include '../controller/InvoiceController.php';

class CourseController
{

    /**
     * This method shows the list of all courses
     */
    public function show()
    {

        $courses = DAOFactory::getCourseDAO()->findAll();
        require_once('../view/showCourse.php');
    }

    /**
     * This method shows the list of all courses belonging to one university
     */
    public function showMine()
    {
        if (isset($_SESSION['loggedIn']) && isset($_SESSION['id'])) {

            $courses = DAOFactory::getCourseDAO()->findAllByUniversity($_SESSION['id']);
            require_once('../view/manageMyCourse.php');
        } else {
            require_once('../view/home.php');
        }
    }

    /**
     * This method creates a new course as well as a invoice and sends it to the costumer
     */
    public function create()
    {
        $course = new Course();
        $courseValidator = new CourseValidator();

        if (!empty($_POST)) {

            $course = new Course(null, $_POST['name'], $_POST['shortDescription'], $_POST['description'], $_POST['expirationDate'], $_SESSION['id']);
            $courseValidator = new CourseValidator($course);

            if ($courseValidator->isValid()) {
                $course = DAOFactory::getCourseDAO()->createCourse($course);
                $university = DAOFactory::getUniversityDAO()->readUniversity($course->getFkUniversity());
                InvoiceController::create("", $university);
                return Route::call('Course', 'showMine');
            }
        }
        require_once('../view/createCourse.php');
    }

    /**
     * This method shows one specific course
     */
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

    /**
     * This method shows a message if the course should really be deleted
     */
    public function deleteAsk()
    {
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $_GET['id'];
        }

        $course = DAOFactory::getCourseDAO()->readCourse($id);
        require_once('../view/deleteCourse.php');
    }

    /**
     * This method deletes the selected course
     */
    public function delete()
    {
        if (!empty($_POST)) {

            DAOFactory::getCourseDAO()->deleteCourse(new Course($_POST['id']));
        }

        return Route::call('Course', 'showMine');
    }

    /**
     * This method updates a course
     */
    public function update()
    {
        $course = new Course();
        $courseValidator = new CourseValidator();

        $id = null;
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }

        if (!empty($_POST)) {
            $course = new Course($id, $_POST['name'], $_POST['shortDescription'], $_POST['description'], $_POST['expirationDate'], $_SESSION['id']);
            $courseValidator = new CourseValidator($course);

            if ($courseValidator->isValid()) {
                $course = DAOFactory::getCourseDAO()->updateCourse($course);
                return Route::call('Course', 'showMine');
            }
        } else {
            $course = DAOFactory::getCourseDAO()->readCourse($id);
        }
        require_once('../view/updateCourse.php');
    }
}