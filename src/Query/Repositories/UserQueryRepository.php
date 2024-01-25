<?php

use User;
use DatabaseConnection\Core\Database\DatabaseConnection;

class UserQueryRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = DatabaseConnection::getInstance();
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $userObj = new User();
            $userObj->setId($user['id']);
            $userObj->setUsername($user['username']);
            $userObj->setPassword($user['password']);
            $userObj->setBirthdate($user['birthdate']);
            return $userObj;
        }
        
        return null;
    }

    public function getAllUsers() {
    }
}
