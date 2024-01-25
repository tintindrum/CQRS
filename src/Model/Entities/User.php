<?php

namespace App\Model\Entities;

class User {
    private $id;
    private $username;
    private $password;
    private $birthdate;

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }
}
