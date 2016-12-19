<?php

include("../model/Course.php");

interface CourseDAOInterface
{

    public function createCourse(Course $course);

    public function readCourse($id);

    public function updateCourse(Course $course);

    public function deleteCourse(Course $course);

    public function findAll();

    public function findAllByUniversity($id);
}