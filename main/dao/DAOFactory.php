<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 17.11.2016
 * Time: 15:46
 */

include 'Database.php';
include 'UniversityDAOImpl.php';
include 'CourseDAOImpl.php';
include 'AdministratorDAOImpl.php';
include 'AdvertisingDAOImpl.php';
include 'InvoiceDAOImpl.php';
include 'PricePackageDAOImpl.php';

abstract class DAOFactory
{

    /**
     * @return UniversityDAOInterface
     */
    public static function getUniversityDAO()
    {
        return new UniversityDAOImpl(Database::connect());
    }

    /**
     * @return CourseDAOInterface
     */
    public static function getCourseDAO()
    {
        return new CourseDAOImpl(Database::connect());
    }

    /**
     * @return AdministratorDAOInterface
     */
    public static function getAdministratorDAO()
    {
        return new AdministratorDAOImpl(Database::connect());
    }

    /**
     * @return UniversityDAOInterface
     */
    public static function getAdvertisingDAO()
    {
        return new AdvertisingDAOImpl(Database::connect());
    }

    /**
     * @return UniversityDAOInterface
     */
    public static function getInvoiceDAO()
    {
        return new InvoiceDAOImpl(Database::connect());
    }

    /**
     * @return UniversityDAOInterface
     */
    public static function getPricePackageDAO()
    {
        return new PricePackageDAOImpl(Database::connect());
    }

}