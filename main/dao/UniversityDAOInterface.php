<?php

include("../model/University.php");

interface UniversityDAOInterface
{

    public function createUniversity(University $university);

    public function readUniversity($id);

    public function readUniversityByCredentials($email, $password);

    public function readUniversityByEmail($email);

    public function updateUniversity(University $university);

    public function deleteUniversity(University $university);

    public function findAll();
}