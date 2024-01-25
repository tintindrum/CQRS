<?php

namespace App\Core;

use ReflectionClass;
use App\Handlers\Query\UserQueryHandler;
use App\Handlers\Command\UserCommandHandler;

class Router {
    private $routes = [];
    private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function addRoute($route, $action) {
        $this->routes[$route] = $action;
    }

    public function dispatch($uri, $method) {
        foreach ($this->routes as $route => $action) {
            if ($uri === $route) {
                [$controllerName, $methodName] = $action;
    
                if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                    // Obtenez les dépendances du conteneur
                    $dependencies = [];
                    $constructor = (new ReflectionClass($controllerName))->getConstructor();
                    if ($constructor) {
                        foreach ($constructor->getParameters() as $param) {
                            $dependency = $param->getClass() ? $param->getClass()->name : null;
                            if ($dependency && $this->container->get($dependency)) {
                                $dependencies[] = $this->container->get($dependency);
                            }
                        }
                    }
    
                    // Créez une instance du contrôleur avec les dépendances
                    $controllerInstance = new $controllerName(...$dependencies);
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
