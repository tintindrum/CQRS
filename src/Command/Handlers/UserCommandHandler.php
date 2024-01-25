<?php 

class UserCommandHandler {
    private $commandRepository;
    private $queryRepository;

    public function __construct(UserCommandRepository $commandRepository, UserQueryRepository $queryRepository) {
        $this->commandRepository = $commandRepository;
        $this->queryRepository = $queryRepository;
    }

    public function handleCreateUserCommand($userData) {
        $user = new User();
        $user->setUsername($userData['username']);
        $user->setPassword($userData['password']);
        $user->setBirthdate($userData['birthdate']);
        $this->repository->addUser($user);
    }

    public function handleUpdateUserCommand($id, $userData) {
        $user = $this->queryRepository->getUserById($id);
        if ($user) {
            $user->setUsername($userData['username']);
            $user->setPassword($userData['password']);
            $user->setBirthdate($userData['birthdate']);
            $this->commandRepository->updateUser($user);
        } else {
            // Gérer le cas où l'utilisateur n'est pas trouvé
        }
    }

    public function handleDeleteUserCommand($id) {
        $this->repository->deleteUser($id);
    }
    
    
}
