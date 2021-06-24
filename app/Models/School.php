<?php

namespace App\Models;
use DB\Connect;
use PDO;
use PDOException;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Class School
 * @package App\Models
 */
class School
{
    /**
     * Test db connection/get students
     * @return false|string
     */
    public static function students()
    {
        try {
            $sth = Connect::getInstance()->db->prepare("SELECT * FROM `students`");
            $sth->execute();
            $results = $sth->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($results);

        } catch (PDOException $e) {
            echo 'Database error!' . $e->getMessage();
        }
    }
}