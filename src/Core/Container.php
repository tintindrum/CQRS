<?php 

namespace App\Core;

class Container {
    private $services = [];

    public function set($name, $object) {
        $this->services[$name] = $object;
    }

    public function get($name) {
        return $this->services[$name] ?? null;
    }
}
