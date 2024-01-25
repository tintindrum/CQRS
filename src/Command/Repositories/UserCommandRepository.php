<?php

class UserCommandRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function addUser(User $user) {
    }

    public function updateUser(User $user) {
    }

    public function getUserById($id) {
    }

    public function deleteUser($id) {
    }
}
