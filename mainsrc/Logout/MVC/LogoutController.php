<?php
namespace App\Logout\MVC;

use App\App\AbstractMVC\AbstractController;

class LogoutController extends AbstractController {

    public function logout() {
        unset($_SESSION['login']);

        $this->pageLoad("Logout", "logout", []);
    }
}