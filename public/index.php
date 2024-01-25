<?php


require __DIR__ . '/../vendor/autoload.php';


use CQRSAutoload\Core\Router;
use Src\Controllers\UserController;
// Gestion des routes
$router = new Router();

UserController::registerRoutes($router);


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
