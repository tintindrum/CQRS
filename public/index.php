<?php

use CQRSAutoload\Core\Router;

require __DIR__ . '/../vendor/autoload.php';

// Gestion des routes
$router = new Router();


$router->addRoute('user/list', 'UserQueryController@listUsers');
$router->addRoute('user/add', 'UserCommandController@createUser');
$router->addRoute('user/update/{id}', 'UserCommandController@updateUser');
$router->addRoute('user/delete/{id}', 'UserCommandController@deleteUser');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
