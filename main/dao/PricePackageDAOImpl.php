<?php

include "AbstractDAO.php";
include "PricePackageDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class PricePackageDAOImpl extends AbstractDAO implements PricePackageDAOInterface
{
    /**
     * @param PricePackage $pricePackage
     * @return PricePackage
     */
    public function createPricePackage(PricePackage $pricePackage)
    {
        if (!is_null($pricePackage->getId())) {
            return $this->updatePricePackage($pricePackage);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO pricePackage (name, price)
            VALUES (:name, :price)');
        $stmt->bindValue(':name', $pricePackage->getName());
        $stmt->bindValue(':price', $pricePackage->getPrice());
        $stmt->execute();
        $pricePackage = $this->readPricePackage($this->pdoInstance->lastInsertId());
        return $pricePackage;
    }

    /**
     * @param PricePackage $pricePackage
     * @return PricePackage
     */
    public function updatePricePackage(PricePackage $pricePackage)
    {
        if (is_null($pricePackage->getId())) {
            throw new LogicException(
                'Cannot update pricePackage that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE pricePackage
            SET name = :name,
                price = :price
            WHERE id = :id
        ');
        $stmt->bindValue(':name', $pricePackage->getName());
        $stmt->bindValue(':price', $pricePackage->getPrice());
        $stmt->bindValue(':id', $pricePackage->getId());
        $stmt->execute();
        return $pricePackage;
    }


    /**
     * @param $id
     * @return PricePackage
     */
    public function readPricePackage($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT pricePackage.id, pricePackage.name, pricePackage.price
             FROM pricePackage 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("PricePackage");
    }

    /**
     * @param PricePackage $pricePackage
     */
    public function deletePricePackage(PricePackage $pricePackage)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM pricePackage
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $pricePackage->getId());
        $stmt->execute();
        $pricePackage = null;
    }


    /**
     * @return PricePackage[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT pricePackage.* FROM pricePackage
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'PricePackage');
    }
}