<?php

namespace App\User\MVC;

use App\App\AbstractMVC\AbstractModel;

class UserModel extends AbstractModel
{
    public $userid;
    public $firstname;
    public $lastname;
    public $username;
    public $mail;
    public $password;
    public $bio;

    public function getName() {
        return $this->firstname . ", " . $this->lastname;
    }

}