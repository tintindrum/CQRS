<?php

use User;
use DatabaseConnection\Core\Database\DatabaseConnection;

class UserCommandRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = DatabaseConnection::getInstance();
    }

    public function addUser(User $user) {
        $sql = "INSERT INTO users (username, password, birthdate) VALUES (:username, :password, :birthdate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword()); // Envisagez d'utiliser password_hash pour stocker des mots de passe sécurisés
        $stmt->bindValue(':birthdate', $user->getBirthdate());
        $stmt->execute();
    }
    

    public function updateUser(User $user) {
        $sql = "UPDATE users SET username = :username, password = :password, birthdate = :birthdate WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $user->getId());
        $stmt->bindValue(':username', $user->getUsername());
        $stmt->bindValue(':password', $user->getPassword()); // Envisagez d'utiliser password_hash pour stocker des mots de passe sécurisés
        $stmt->bindValue(':birthdate', $user->getBirthdate());
        $stmt->execute();
    }
    

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch();
    }
    

    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    
}