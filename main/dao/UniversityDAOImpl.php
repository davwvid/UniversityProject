<?php

require_once "AbstractDAO.php";
include "UniversityDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class UniversityDAOImpl extends AbstractDAO implements UniversityDAOInterface
{
    /**
     * @param University $university
     * @return University
     */
    public function createUniversity(University $university)
    {
        if (!is_null($university->getId())) {
            return $this->updateUniversity($university);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO university (name, link, description, email, password, fkPricePackage)
            VALUES (:name, :link , :description, :email, :password, :fkPricePackage)');
        $stmt->bindValue(':name', $university->getName());
        $stmt->bindValue(':link', $university->getLink());
        $stmt->bindValue(':description', $university->getDescription());
        $stmt->bindValue(':email', $university->getEmail());
        $stmt->bindValue(':password', $university->getPassword());
        $stmt->bindValue(':fkPricePackage', $university->getFkPricePackage());
        $stmt->execute();
        $university = $this->readUniversity($this->pdoInstance->lastInsertId());
        return $university;
    }

    /**
     * @param University $university
     * @return University
     */
    public function updateUniversity(University $university)
    {
        if (is_null($university->getId())) {
            throw new LogicException(
                'Cannot update university that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE university
            SET name = :name,
                link = :link,
                description = :description,
                email = :email,
                password = :password,
                fkPricePackage = :fkPricePackage
            WHERE id = :id
        ');
        $stmt->bindValue(':name', $university->getName());
        $stmt->bindValue(':link', $university->getLink());
        $stmt->bindValue(':description', $university->getDescription());
        $stmt->bindValue(':email', $university->getEmail());
        $stmt->bindValue(':password', $university->getPassword());
        $stmt->bindValue(':fkPricePackage', $university->getFkPricePackage());
        $stmt->bindValue(':id', $university->getId());
        $stmt->execute();
        return $university;
    }


    /**
     * @param $id
     * @return University
     */
    public function readUniversity($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT university.*
             FROM university 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("University");
    }

    /**
     * @param $email
     * @param $password
     * @return University
     */
    public function readUniversityByCredentials($email, $password)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT university.*
             FROM university 
             WHERE email = :email
             AND password = :password
        ');
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        return $stmt->fetchObject("University");
    }


    /**
     * @param $email
     * @return University
     */
    public function readUniversityByEmail($email)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT university.*
             FROM university 
             WHERE email = :email
        ');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetchObject("University");
    }


    /**
     * @param University $university
     */
    public function deleteUniversity(University $university)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM university
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $university->getId());
        $stmt->execute();
        $university = null;
    }


    /**
     * @return University[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT university.* FROM university
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'University');
    }
}