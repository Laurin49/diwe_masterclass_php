<?php
namespace App\App;
use App\Connections\ConMySQL;
use App\User\UserDatabase;

class Container {
    private $classInstances = [];
    private $builds = [];

    public function __construct()
    {
        $this->builds = [
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