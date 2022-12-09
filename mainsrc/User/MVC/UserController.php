<?php
namespace App\User\MVC;

use App\App\AbstractMVC\AbstractController;
use App\User\UserDatabase;

class UserController extends AbstractController {

    private $userDatabase;

    public function __construct(UserDatabase $userDatabase) {
        $this->userDatabase = $userDatabase;
    }

    public function allUsers() {
        $users = $this->userDatabase->getUsers();
        $this->pageLoad("User", "users", [
            "users" => $users
        ]);
    }

    public function userprofile() {
        $userid = $_GET["userid"];
        $user = $this->userDatabase->getUser($userid);
        $this->pageLoad("User", "user", [
            "user" => $user
        ]);
    }
}