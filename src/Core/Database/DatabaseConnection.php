<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class DatabaseConnection {
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $dsn = "mysql:host=your_host;dbname=your_db;charset=utf8";
                $username = 'your_username';
                $password = 'your_password';
                
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];
                self::$instance = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                throw $e;
            }
        }
        return self::$instance;
    }
}
