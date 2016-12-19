<?php

include 'Database.php';
include 'UniversityDAOImpl.php';
include 'CourseDAOImpl.php';
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
     * @return InvoiceDAOInterface
     */
    public static function getInvoiceDAO()
    {
        return new InvoiceDAOImpl(Database::connect());
    }

    /**
     * @return PricePackageDAOInterface
     */
    public static function getPricePackageDAO()
    {
        return new PricePackageDAOImpl(Database::connect());
    }

}