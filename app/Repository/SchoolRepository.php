<?php
namespace App\Repository;
use DB\Connect;
use PDO;
use PDOException;
use SimpleXMLElement;

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
        return (new self)->resource((new self)->singleStudent($id), (new self)->average($id), (new self)->gradesJson($id));
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
    private function grades(int $id, string $board): array
    {
        {
            try {
                $sth = Connect::getInstance()->db->prepare("SELECT grade FROM {$board} WHERE student_id = $id");
                $sth->bindParam(':id', $id);
                $sth->execute();
                return $sth->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo 'Database error!' . $e->getMessage();
            }
        }
    }

    /**
     * @param int $id
     * @return array
     */
    private function gradesJson(int $id): array
    {
        return $this->grades($id, 'csm');
    }

    /**
     * @param int $id
     * @return array
     */
    private function gradesXml(int $id): array
    {
        return $this->grades($id, 'csmb');
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
        if (!empty($average['averageGrade'])) {
           return $average['averageGrade'] >= 7 ? 'Pass' : "Fail";
        }
        return $average['maxGrade'] > 8 ? 'Pass' : "Fail";
    }

    /**
     * @param int $id
     * @return array
     */
    public static function xml(int $id): array
    {
        return (new self)->resource((new self)->singleStudent($id), (new self)->averageXml($id), (new self)->gradesXml($id));
    }

    /**
     * @param int $id
     * @return array
     */
    private function averageXml(int $id): array
    {
        {
            try {
                $sth = Connect::getInstance()->db->prepare("SELECT MAX(grade) as maxGrade FROM csmb WHERE student_id = $id");
                $sth->bindParam(':id', $id);
                $sth->execute();
                return $sth->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                echo 'Database error!' . $e->getMessage();
            }
        }
    }

    /**
     * @param array $parse_xml
     * @return string
     */
    public static function parseXml(array $parse_xml): string
    {
        return (new self)->array2xml($parse_xml);
    }

    /**
     * @param array $parse_xml
     * @param null $root
     * @return string
     * @throws \Exception
     */
    private function array2xml(array $parse_xml, $root = null): string
    {
        $xml = new SimpleXMLElement($root ? '<' . $root . '/>' : '<root/>');
        array_walk_recursive($parse_xml, function($value, $key)use($xml){
            $xml->addChild($key, $value);
        });
        return $xml->asXML();
    }
}