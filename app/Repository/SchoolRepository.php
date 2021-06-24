<?php
namespace App\Repository;
use DB\Connect;
use PDO;
use PDOException;
/**
 * Class SchoolRepository
 */
class SchoolRepository
{
    public static function checkStudentBoard($id)
    {
        try {
            $sth = Connect::getInstance()->db->prepare("SELECT board FROM students WHERE id = $id");
            $sth->bindParam(':id', $id);
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo 'Database error!' . $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public static function json(int $id): array {
        return (new self)->resource((new self)->singleStudent($id), (new self)->average($id), (new self)->grades($id));
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

    /**
     * @param int $id
     * @return array
     */
    private function average(int $id): array
    {
        {
            try {
                $sth = Connect::getInstance()->db->prepare("SELECT AVG(grade) AS averageGrade FROM csm WHERE student_id = $id");
                $sth->bindParam(':id', $id);
                $sth->execute();
                return $sth->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo 'Database error!' . $e->getMessage();
            }
        }
    }

    /**
     * @param int $id
     * @return array
     */
    private function grades(int $id): array
    {
        {
            try {
                $sth = Connect::getInstance()->db->prepare("SELECT grade FROM csm WHERE student_id = $id");
                $sth->bindParam(':id', $id);
                $sth->execute();
                return $sth->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo 'Database error!' . $e->getMessage();
            }
        }
    }

    /**
     * @param array $student
     * @param array $average
     * @return array
     */
    private function resource(array $student, array $average, array $grades): array
    {
        return [
            'id' => $student['id'],
            'name' => $student['name'],
            'average' => $average,
            'list_of_grades' => $grades,
            'result' => $this->result($average),
        ];
    }

    /**
     * @param array $average
     * @return string
     */
    private function result(array $average): string
    {
        return $average['averageGrade'] >= 7 ? 'Pass' : "Fail";
    }

    public static function xml()
    {

    }
}