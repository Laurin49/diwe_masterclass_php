<?php
namespace App\App;
use App\Connections\ConMySQL;
use App\Error\MVC\ErrorController;
use App\Home\IndexDatabase;
use App\Home\MVC\IndexController;
use App\Login\MVC\LoginAuth;
use App\Login\MVC\LoginController;
use App\Logout\MVC\LogoutController;
use App\Register\MVC\RegisterController;
use App\Register\RegisterDatabase;
use App\User\MVC\UserController;
use App\User\UserDatabase;
use App\UserDashboard\MVC\UserDashboardController;

class Container {
    private $classInstances = [];
    private $builds = [];

    public function __construct()
    {
        $this->builds = [
            'router' => function(){
                return new Router($this->build("container"));
            },
            "container" => function(){
                return new Container();
            },
            'errorController' => function() {
                return new ErrorController();
            },
            'userDashboardController' => function() {
                return new UserDashboardController();
            },
            'indexController' => function() {
                return new IndexController($this->build('indexDatabase'));
            },
            'indexDatabase' => function() {
                return new IndexDatabase($this->build('pdo'));
            },
            'loginController' => function() {
                return new LoginController($this->build('loginAuth'));
            },
            'loginAuth' => function() {
                return new LoginAuth($this->build('userDatabase'));
            },
            'logoutController' => function() {
                return new LogoutController();
            },
            'registerController' => function() {
                return new RegisterController($this->build('userDatabase'));
            },
            'userController' => function() {
                return new UserController($this->build('userDatabase'));
            },
            'userDatabase' => function() {
                return new UserDatabase($this->build('pdo'));
            },
            'pdo' => function() {
                $connection = new ConMySQL();
                return $connection->conToMySQL1();
            }
        ];
    }

    public function build($objekt) {
        if (isset($this->builds[$objekt])) {
            if (!empty($this->classInstances[$objekt])) {
                return $this->classInstances[$objekt];
            }
            $this->classInstances[$objekt] = $this->builds[$objekt]();
        }
        return $this->classInstances[$objekt];
    }
}