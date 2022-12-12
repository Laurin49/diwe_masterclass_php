<?php
namespace App\Login\MVC;

use App\SecurityLogin\SecurityLoginDatabase;
use App\User\UserDatabase;

class LoginAuth {
    public function __construct(UserDatabase $userDatabase, SecurityLoginDatabase $securityLoginDatabase)
    {
        $this->userDatabase = $userDatabase;
        $this->securityLoginDatabase = $securityLoginDatabase;
    }

    public function buildStayin($mail) {
        $identifier = bin2hex(time() . random_bytes(8));
        $securitytoken = bin2hex(time() . random_bytes(10));
        $user = $this->userDatabase->getUser("", $mail);
        $this->securityLoginDatabase->newStayin($user->userid, $identifier, password_hash($securitytoken, PASSWORD_DEFAULT));
        setcookie("identifier", $identifier, time() + 3600*24*365);
        setcookie("securitytoken", $securitytoken, time() + 3600*24*365);
    }

    public function checkStayin() {
        if (isset($_COOKIE['identifier'])) {
            if (isset($_COOKIE['securitytoken'])) {
                $stayindata = $this->securityLoginDatabase->getStayinData($_COOKIE['identifier']);
                if (!password_verify($_COOKIE['securitytoken'], $stayindata->securitytoken)) {
                    die("Auto-Login nicht möglich");
                } else {
                    session_regenerate_id(true);

                    $_SESSION['userid'] = $stayindata->userid;
                    $userdata = $this->userDatabase->getUser($stayindata->userid, "");
                    $_SESSION['username'] = $userdata->username;
                    $_SESSION['login'] = true;
                }
            }
        }
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