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

    public static function resource(int $id) {
        $csm = (new self)->csm($id);
        $student = (new self)->singleStudent($id);
        return [
            'id' => $student['id'],
            'name' => $student['name'],
            'average' => $csm
        ];
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
            return $sth->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Database error!' . $e->getMessage();
        }
    }

    private function csm($id)
    {
        {
            try {
                $sth = Connect::getInstance()->db->prepare("SELECT AVG(grade) AS averageGrage FROM csm WHERE student_id = $id");
                $sth->bindParam(':id', $id);
                $sth->execute();
                return $sth->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo 'Database error!' . $e->getMessage();
            }
        }
    }
}