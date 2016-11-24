<?php

include "AbstractDAO.php";
include "AdvertisingDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class AdvertisingDAOImpl extends AbstractDAO implements AdvertisingDAOInterface
{
    /**
     * @param Advertising $advertising
     * @return Advertising
     */
    public function createAdvertising(Advertising $advertising)
    {
        if (!is_null($advertising->getId())) {
            return $this->updateAdvertising($advertising);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO advertising (name, date, price, fkUniversity)
            VALUES (:name, :date , :price, :fkUniversity)');
        $stmt->bindValue(':name', $advertising->getName());
        $stmt->bindValue(':date', $advertising->getDate());
        $stmt->bindValue(':price', $advertising->getPrice());
        $stmt->bindValue(':fkUniversity', $advertising->getFkUniversity());
        $stmt->execute();
        $advertising = $this->readAdvertising($this->pdoInstance->lastInsertId());
        return $advertising;
    }

    /**
     * @param Advertising $advertising
     * @return Advertising
     */
    public function updateAdvertising(Advertising $advertising)
    {
        if (is_null($advertising->getId())) {
            throw new LogicException(
                'Cannot update advertising that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE advertising
            SET name = :name,
                date = :date,
                price = :price,
                fkUniversity = :fkUniversity
            WHERE id = :id
        ');
        $stmt->bindValue(':name', $advertising->getName());
        $stmt->bindValue(':date', $advertising->getDate());
        $stmt->bindValue(':price', $advertising->getPrice());
        $stmt->bindValue(':fkUniversity', $advertising->getFkUniversity());
        $stmt->bindValue(':id', $advertising->getId());
        $stmt->execute();
        return $advertising;
    }


    /**
     * @param $id
     * @return Advertising
     */
    public function readAdvertising($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT advertising.id, advertising.name, advertising.date, advertising.price, advertising.fkUniversity
             FROM advertising 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("Advertising");
    }

    /**
     * @param Advertising $advertising
     */
    public function deleteAdvertising(Advertising $advertising)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM advertising
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $advertising->getId());
        $stmt->execute();
        $advertising = null;
    }


    /**
     * @return Advertising[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT advertising.* FROM advertising
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Advertising');
    }
}