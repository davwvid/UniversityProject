<?php

include "AbstractDAO.php";
include "AdministratorDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class AdministratorDAOImpl extends AbstractDAO implements AdministratorDAOInterface
{
    /**
     * @param Administrator $administrator
     * @return Administrator
     */
    public function createAdministrator(Administrator $administrator)
    {
        if (!is_null($administrator->getId())) {
            return $this->updateAdministrator($administrator);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO administrator (name, email, password)
            VALUES (:email, :password)');
        $stmt->bindValue(':email', $administrator->getEmail());
        $stmt->bindValue(':password', $administrator->getPassword());
        $stmt->execute();
        $administrator = $this->readAdministrator($this->pdoInstance->lastInsertId());
        return $administrator;
    }

    /**
     * @param Administrator $administrator
     * @return Administrator
     */
    public function updateAdministrator(Administrator $administrator)
    {
        if (is_null($administrator->getId())) {
            throw new LogicException(
                'Cannot update administrator that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE administrator
            SET email = :email,
                password = :password
            WHERE id = :id
        ');
        $stmt->bindValue(':email', $administrator->getEmail());
        $stmt->bindValue(':password', $administrator->getPassword());
        $stmt->bindValue(':id', $administrator->getId());
        $stmt->execute();
        return $administrator;
    }


    /**
     * @param $id
     * @return Administrator
     */
    public function readAdministrator($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT administrator.id, administrator.email, administrator.password
             FROM administrator 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("Administrator");
    }

    /**
     * @param Administrator $administrator
     */
    public function deleteAdministrator(Administrator $administrator)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM administrator
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $administrator->getId());
        $stmt->execute();
        $administrator = null;
    }


    /**
     * @return Administrator[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT administrator.* FROM administrator
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Administrator');
    }
}