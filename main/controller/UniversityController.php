<?php

include '../dao/DAOFactory.php';

class UniversityController
{
    public function show()
    {

        $universities = DAOFactory::getUniversityDAO()->findAll();
        require_once('../view/showUniversity.php');
    }
}