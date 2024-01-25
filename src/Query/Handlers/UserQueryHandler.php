<?php

class UserQueryHandler {
    private $repository;

    public function __construct(UserQueryRepository $repository) {
        $this->repository = $repository;
    }

    public function handleListUsersQuery() {
        return $this->repository->getAllUsers();
    }

    public function handleGetUserByIdQuery($id) {
        return $this->repository->getUserById($id);
    }
}
