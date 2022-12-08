<?php
namespace App\Connections;
use PDO;

class ConMySQL {
    public function conToMySQL1() {
        $pdo = new PDO('mysql:host=localhost;dbname=diwe_users_php;charset=utf8',
            'Dirk', 'Welter56');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }
}
