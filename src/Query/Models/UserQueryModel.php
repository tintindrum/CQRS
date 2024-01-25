<?php

class UserQueryModel {
    private $id;
    private $username;
    private $birthdate;
    // plus besoin du mot de passe ici
   
    private $age;

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getAge() {
        // calcule l age basé sur la date de naissance
        $today = new DateTime();
        $birthdate = new DateTime($this->birthdate);
        $age = $today->diff($birthdate);
        return $age->y;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

}
