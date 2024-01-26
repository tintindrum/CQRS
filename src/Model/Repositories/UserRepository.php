<?php

namespace App\Model\Repositories;

use PDO;
use App\Model\Entities\User;
use App\Core\Database\DatabaseConnection;

class UserRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = DatabaseConnection::getInstance();
    }

    public function addUser(User $user) {
        $sql = "INSERT INTO users (username, password, birthdate) VALUES (:username, :password, :birthdate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword()); 
        $stmt->bindValue(':birthdate', $user->getBirthdate());
        $stmt->execute();
    }
    

    public function updateUser(User $user) {
        $sql = "UPDATE users SET username = :username, password = :password, birthdate = :birthdate WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword()); 
        $stmt->bindValue(':birthdate', $user->getBirthdate());
        $stmt->execute();
    }
    

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Model\Entities\User');
        return $stmt->fetch();
    }
    

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'App\Model\Entities\User'); 
    }
    
    
}
