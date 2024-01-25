<?php

class UserQueryRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
    }

    public function getAllUsers() {
    }
}
