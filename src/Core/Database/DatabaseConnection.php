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
                $host = 'postgres_mvc'; 
                $db = 'mvc';
                $user = 'admin';
                $password = 'admin';

                $dsn = "pgsql:host=$host;dbname=$db";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

                self::$instance = new PDO($dsn, $user, $password, $options);

                self::$instance->exec("SET NAMES 'utf8'");
            } catch (PDOException $e) {
                throw $e;
            }
        }
        return self::$instance;
    }
}
