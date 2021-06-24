<?php

namespace DB;
use PDO;
use PDOException;
use Exception;

/**
 * Class Connect
 * @package DB
 */
class Connect {
    public $db;
    public $isConnected;
    public static $instance = null;

    /**
     * @return static|null
     */
    public static function getInstance() {
        if (self::$instance == null) self::$instance = new static();
        return self::$instance;
    }

    /**
     * Connect constructor.
     * @throws Exception
     */
    private function __construct() {
        $this->isConnected = true;
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=school_board;charset=UTF8','root','pass');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        }catch(PDOException $e) {
            $this->isConnected = false;
            throw new Exception($e->getMessage());
        }
    }
}