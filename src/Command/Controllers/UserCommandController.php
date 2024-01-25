<?php 


class UserCommandController extends BaseController {
    private $commandHandler;
    private $queryHandler; 

    public function __construct(UserCommandHandler $commandHandler, UserQueryHandler $queryHandler) {
        $this->commandHandler = $commandHandler;
        $this->queryHandler = $queryHandler;
    }

    public function createUser() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->commandHandler->handleCreateUserCommand($_POST);
            header('Location: /user/list');
            exit();
        }
        include "./views/addUser.phtml";
    }

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
    
    
}
