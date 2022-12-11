<?php
namespace App\Login\MVC;

use App\User\UserDatabase;

class LoginAuth {
    public function __construct(UserDatabase $userDatabase)
    {
        $this->userDatabase = $userDatabase;
    }

    public function checkLogin($mail, $password) {
        $user = $this->userDatabase->getUser("", $mail);
        if ($user) {
            if (password_verify($password, $user->password)) {
                $user = $this->userDatabase->getUser("", $mail);

                // Generiert bei jedem erfolgreichen Login eine neue Session ID,
                // behebt Problem Session Hacking, Sitzungsfixierung
                session_regenerate_id(true);

                $_SESSION['userid'] = $user->userid;
                $_SESSION['username'] = $user->username;
                $_SESSION['login'] = true;
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
}