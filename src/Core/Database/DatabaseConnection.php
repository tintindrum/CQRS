<?php

namespace DatabaseConnection\Core\Database;

use PDO;
use PDOException;

class DatabaseConnection {
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance() {
        if (self::$instance === null) {
            try {
                $host = 'postgres'; 
                $db = 'exo-cqrs';
                $user = 'admin';
                $password = 'admin';
                $charset = 'utf8';

                $dsn = "pgsql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];

                self::$instance = new PDO($dsn, $user, $password, $options);
            } catch (PDOException $e) {
                // Gérer l'exception ou la relancer
                throw $e;
            }
        }
        return self::$instance;
    }
}
