<?php
namespace App\Login\MVC;

use App\App\AbstractMVC\AbstractController;
use App\User\UserDatabase;

class LoginController extends AbstractController {

    public function __construct(LoginAuth $loginAuth)
    {
        $this->loginAuth = $loginAuth;
    }

    public function login() {
        $error = null;
        if (!empty($_POST)) {
            $mail = $_POST["email"];
            $password = $_POST["password"];

            if (!empty($_POST['stayin'])) {
                $this->loginAuth->buildStayin($mail);
            }

            $login = $this->loginAuth->checkLogin($mail, $password);
            if ($login) {
                header("Location: Dashboard");
            } else {
                $error = "Login fehlgeschlagen.";
            }
        }
        if (!isset($_SESSION['login'])) {
            $this->loginAuth->checkStayin();
        }

        if (!empty($_SESSION['login'])) {
            header("Location: Dashboard");
        } else {
            $this->pageLoad("Login", "login", [
                "error" => $error
            ]);
        }
    }
}
