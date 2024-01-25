<?php

namespace CQRSAutoload\Core; 

class Router {
    private $routes = [];

    public function addRoute($route, $action) {
        $this->routes[$route] = $action;
    }

    public function dispatch($uri, $method) {
        foreach ($this->routes as $route => $action) {
                    if ($uri === $route) {
                        list($controllerName, $methodName) = explode('@', $action);
                        var_dump($controllerName);
        
                      
                        $controllerFullPath = "$controllerName";
        
                        if (class_exists($controllerFullPath) && method_exists($controllerFullPath, $methodName)) {
                            $controllerInstance = new $controllerFullPath();
                            $controllerInstance->$methodName();
                        } else {
                            header("HTTP/1.0 404 Not Found");
                            echo "Controller or method not found";
                        }
                        return;
                    }
                }
                
                header("HTTP/1.0 404 Not Found");
                echo "Page not found";
            }
        }
    
