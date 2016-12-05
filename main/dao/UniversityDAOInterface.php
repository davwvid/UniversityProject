<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/University.php");

interface UniversityDAOInterface
{

    public function createUniversity(University $university);

    public function readUniversity($id);

    public function readUniversityByCredentials($email, $password);

    public function updateUniversity(University $university);

    public function deleteUniversity(University $university);

    public function findAll();
}