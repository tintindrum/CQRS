<?php

require '../vendor/autoload.php';

use App\Controllers\UserController;
use App\Core\Router;


// Gestion des routes
$router = new Router();

UserController::registerRoutes($router);


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
