<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/Administrator.php");

interface AdministratorDAOInterface
{

    public function createAdministrator(Administrator $administrator);

    public function readAdministrator($id);

    public function updateAdministrator(Administrator $administrator);

    public function deleteAdministrator(Administrator $administrator);

    public function findAll();
}