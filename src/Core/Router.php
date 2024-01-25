<?php

namespace Router\Core; 

class Router {
    private $routes = [];

    public function addRoute($route, $action) {
        $this->routes[$route] = $action;
    }

    public function dispatch($uri, $method) {
        foreach ($this->routes as $route => $action) {
            
        }
    }

}
