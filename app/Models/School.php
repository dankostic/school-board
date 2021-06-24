<?php

namespace App\Models;
use DB\Connect;
use PDO;
use PDOException;

/**
 * Class School
 * @package App\Models
 */
class School
{
    /**
     * Get list of all student
     * @return array
     */
    public static function students(): array
    {
        try {
            $sth = Connect::getInstance()->db->prepare("SELECT * FROM `students`");
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Database error!' . $e->getMessage();
        }
    }

    /**
     * Get single student
     * @param int $id
     * @return array
     */
    public static function singleStudent(int $id): array
    {
        try {
            $sth = Connect::getInstance()->db->prepare("SELECT * FROM `students` WHERE id = {$id}");
            $sth->bindParam(':id', $id);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Database error!' . $e->getMessage();
        }
    }
}