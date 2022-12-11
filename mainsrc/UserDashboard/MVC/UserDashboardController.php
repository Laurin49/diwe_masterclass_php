<?php
namespace App\UserDashboard\MVC;

use App\App\AbstractMVC\AbstractController;

class UserDashboardController extends AbstractController {
    public function __construct()
    {
    }

    public function userDashboardMain() {
        if ($_SESSION['login']) {
            $this->pageLoad("UserDashboard", "userDashboardMain", [

            ]);
        } else {
            header("Location: Login");
        }
    }
}