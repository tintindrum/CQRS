<?php 

namespace App\Controllers;
use App\Core\Router;
use App\Core\BaseController;
use App\Handlers\Query\UserQueryHandler;
use App\Handlers\Command\UserCommandHandler;


//[Route("user")]
class UserController extends BaseController {
    private $commandHandler;
    private $queryHandler; 

    public function __construct(UserCommandHandler $commandHandler, UserQueryHandler $queryHandler) {
        $this->commandHandler = $commandHandler;
        $this->queryHandler = $queryHandler;
    }


    public function index() {
        include __DIR__ . "/../../views/index.phtml";
    }
    //[Route("add")]
    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->commandHandler->handleCreateUserCommand($_POST);
            header('Location: /user/list');
            exit();
        }
        include __DIR__ . "/../../views/addUser.phtml";
    }
    //[Route("update/{id}")]
    public function updateUser($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->commandHandler->handleUpdateUserCommand($id, $_POST);
            header('Location: /user/list');
            exit();
        }
        $user = $this->queryHandler->handleGetUserByIdQuery($id);
        include __DIR__ . "/../../views/updateUser.phtml";
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
        include __DIR__ . "/../../views/listUser.phtml";
    }


    public static function registerRoutes(Router $router) {
        $router->addRoute('/', [self::class, 'index']);
        $router->addRoute('/user/list', [self::class, 'listUsers']);
        $router->addRoute('/user/add', [self::class, 'createUser']);
        $router->addRoute('/user/update/{id}', [self::class, 'updateUser']);
        $router->addRoute('/user/delete/{id}', [self::class, 'deleteUser']);
        
    }
    
    
    
    
    
}
