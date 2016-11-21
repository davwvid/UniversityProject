<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 17.11.2016
 * Time: 15:46
 */

include 'Database.php';
include 'UniversityDAOImpl.php';

abstract class DAOFactory
{

    /**
     * @return UniversityDAOInterface
     */
    public static function getUniversityDAO()
    {
        return new UniversityDAOImpl(Database::connect());
    }

}