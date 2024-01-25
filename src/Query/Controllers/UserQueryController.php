<?php

class UserQueryController extends BaseController {
    private $queryHandler;

    public function __construct(UserQueryHandler $queryHandler) {
        $this->queryHandler = $queryHandler;
    }

    public function listUsers() {
        $users = $this->queryHandler->handleListUsersQuery();
        include "./views/listUser.phtml";
    }
}
