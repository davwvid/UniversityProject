<?php

require_once '../main/dao/DAOFactory.php';

$universities = DAOFactory::getUniversityDAO()->findAll();

foreach ($universities as $university) {

    $courses = DAOFactory::getCourseDAO()->findAllByUniversity($university->getId());

    foreach ($course as $course) {

        $today = date("Y-m-d");
        $date = $course->getExpirationDate()->format('Y-m-d');

        if ($today < $date) {

            $msg = "Hello, " . $university->getName() . "\nCourse " . $course->getName() . " has expired";
            $msg = wordwrap($msg, 70);
            mail($university->getEmail(), "Course expired", $msg);
        }
    }
}

?>