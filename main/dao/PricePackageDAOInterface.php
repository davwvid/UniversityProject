<?php

include("../model/PricePackage.php");

interface PricePackageDAOInterface
{

    public function createPricePackage(PricePackage $pricePackage);

    public function readPricePackage($id);

    public function updatePricePackage(PricePackage $pricePackage);

    public function deletePricePackage(PricePackage $pricePackage);

    public function findAll();
}