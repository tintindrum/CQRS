<?php 

class UserCommandHandler {
    private $repository;

    public function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }

    public function handleCreateUserCommand($userData) {
        $user = new User();
        $user->setUsername($userData['username']);
        $user->setPassword($userData['password']);
        $user->setBirthdate($userData['birthdate']);
        $this->repository->addUser($user);
    }

    public function handleUpdateUserCommand($id, $userData) {
        $user = $this->repository->getUserById($id);
        if ($user) {
            $user->setUsername($userData['username']);
            $user->setPassword($userData['password']);
            $user->setBirthdate($userData['birthdate']);
            $this->repository->updateUser($user);
        } else {
        }
    }

    public function handleDeleteUserCommand($id) {
        $this->repository->deleteUser($id);
    }
    
    
}
