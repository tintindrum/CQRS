<?php

require '../vendor/autoload.php';

use App\Core\Router;
use App\Core\Container;
use App\Controllers\UserController;
use App\Handlers\Query\UserQueryHandler;
use App\Model\Repositories\UserRepository;
use App\Handlers\Command\UserCommandHandler;

$container = new Container();

$container->set(UserRepository::class, new UserRepository());

$container->set(UserCommandHandler::class, new UserCommandHandler($container->get(UserRepository::class)));
$container->set(UserQueryHandler::class, new UserQueryHandler($container->get(UserRepository::class)));

$router = new Router($container);
UserController::registerRoutes($router);

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);
