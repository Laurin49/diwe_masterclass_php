<?php

namespace App\Register\MVC;

use App\App\AbstractMVC\AbstractController;
use App\User\UserDatabase;

class RegisterController extends AbstractController {

    public function __construct(UserDatabase $userDatabase) {
        $this->userDatabase = $userDatabase;
    }

    public function register() {
        $fail = null;
        if (!empty($_POST)) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $mail = $_POST['email'];
            $password = $_POST['password'];
            $submit = $_POST['submit'];

            if (empty($firstname and $lastname and $username and $mail and $password)) {
                $fail = "Bitte füllen Sie alle Fehler aus.";
            } else {
                $user = $this->userDatabase->getUserByEmail($mail);
                if (empty($user)) {
                    $this->userDatabase->newUser($firstname, $lastname, $username, $mail, password_hash($password, PASSWORD_DEFAULT));
                } else {
                    $fail = "Ein Account mit dieser E-Mail existiert bereits";
                }
            }
        }
        $this->pageLoad("Register", "register", [
            "fail" => $fail
        ]);
    }
}