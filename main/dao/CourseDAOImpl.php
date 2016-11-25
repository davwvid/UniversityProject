<?php

require_once "AbstractDAO.php";
include "CourseDAOInterface.php";

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 14.11.2016
 * Time: 11:36
 */
class CourseDAOImpl extends AbstractDAO implements CourseDAOInterface
{
    /**
     * @param Course $course
     * @return Course
     */
    public function createCourse(Course $course)
    {
        if (!is_null($course->getId())) {
            return $this->updateCourse($course);
        }
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO course (name, shortDescription, description, expirationDate, fkUniversity)
            VALUES (:name, :shortDescription , :description, :expirationDate, :fkUniversity)');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':shortDescription', $course->getShortDescription());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':expirationDate', $course->getExpirationDate());
        $stmt->bindValue(':fkUniversity', $course->getFkUniversity());
        $stmt->execute();
        $course = $this->readCourse($this->pdoInstance->lastInsertId());
        return $course;
    }

    /**
     * @param Course $course
     * @return Course
     */
    public function updateCourse(Course $course)
    {
        if (is_null($course->getId())) {
            throw new LogicException(
                'Cannot update course that does not yet exist in the database.'
            );
        }
        $stmt = $this->pdoInstance->prepare('
            UPDATE course
            SET name = :name,
                shortDescription = :shortDescription,
                description = :description,
                expirationDate = :expirationDate,
                fkUniversity = :fkUniversity
            WHERE id = :id
        ');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':shortDescription', $course->getShortDescription());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':expirationDate', $course->getExpirationDate());
        $stmt->bindValue(':fkUniversity', $course->getFkUniversity());
        $stmt->bindValue(':id', $course->getId());
        $stmt->execute();
        return $course;
    }


    /**
     * @param $id
     * @return Course
     */
    public function readCourse($id)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT course.id, course.name, course.shortDescription, course.description, course.expirationDate, course.fkUniversity
             FROM course 
             WHERE id = :id
        ');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject("Course");
    }

    /**
     * @param Course $course
     */
    public function deleteCourse(Course $course)
    {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM course
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $course->getId());
        $stmt->execute();
        $course = null;
    }


    /**
     * @return Course[]
     */
    public function findAll()
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT course.* FROM course
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Course');
    }
}