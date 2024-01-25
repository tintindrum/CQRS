<?php 

namespace Src\Controllers;
use BaseController;
use UserQueryHandler;
use UserCommandHandler;
use CQRSAutoload\Core\Router;
require __DIR__ . '/../vendor/autoload.php';

//[Route("user")]
class UserController extends BaseController {
    private $commandHandler;
    private $queryHandler; 

    public function __construct(UserCommandHandler $commandHandler, UserQueryHandler $queryHandler) {
        $this->commandHandler = $commandHandler;
        $this->queryHandler = $queryHandler;
    }
//[Route("add")]
    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->commandHandler->handleCreateUserCommand($_POST);
            header('Location: /user/list');
            exit();
        }
        include __DIR__ . "/../views/addUser.phtml";
    }
//[Route("update/{id}")]
    public function updateUser($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->commandHandler->handleUpdateUserCommand($id, $_POST);
            header('Location: /user/list');
            exit();
        }
        $user = $this->queryHandler->handleGetUserByIdQuery($id);
        include "./views/updateUser.phtml";
    }

    public function deleteUser($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $this->commandHandler->handleDeleteUserCommand($id);
            header('Location: /user/list');
            exit();
        }
    }

    public function listUsers() {
        $users = $this->queryHandler->handleListUsersQuery();
        include "./views/listUser.phtml";
    }


    public static function registerRoutes(Router $router) {
        $router->addRoute('user/list', [self::class, 'listUsers']);
        $router->addRoute('user/add', [self::class, 'createUser']);
        $router->addRoute('user/update/{id}', [self::class, 'updateUser']);
        $router->addRoute('user/delete/{id}', [self::class, 'deleteUser']);
    }
    
    
    
    
    
}
