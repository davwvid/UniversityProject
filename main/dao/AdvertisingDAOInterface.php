<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:34
 */
include("../model/Advertising.php");

interface AdvertisingDAOInterface
{

    public function createAdvertising(Advertising $advertising);

    public function readAdvertising($id);

    public function updateAdvertising(Advertising $advertising);

    public function deleteAdvertising(Advertising $advertising);

    public function findAll();
}