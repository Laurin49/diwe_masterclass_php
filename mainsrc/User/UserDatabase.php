<?php
namespace App\User;
use PDO;

class UserDatabase {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function newUser() {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "INSERT INTO " . $table . " (firstname, lastname, username, mail, password, bio)";
            $sql .= " VALUES (:firstname, :lastname, :username, :mail, :password, :bio)";
            $stmt = $this->pdo->query($sql);
            $stmt->execute([
                ':firstname' => "Laslo",
                ':lastname' => "Benes",
                ":username" => "lbenes",
                ":mail" => "benes@hsv.de",
                ":password" => "benes12345",
                ":bio" => "Mittelfeld links"
            ]);
        }
    }

    public function new2User() {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "INSERT INTO ". $table . "(userid, firstname, lastname, username, mail, password, bio)";
            $sql .= " VALUES (NULL, 'Robert', 'Glatzel', 'glatzel09', 'glatzel@hsv.de', 'glatzel12345', 'Stürmer')";
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
        }
    }

    public function deleteUser($id) {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "DELETE FROM ". $table . " WHERE userid = :userid";
            $stmt = $this->pdo->query($sql);
            // $stmt->bindParam(":userid", $id);
            $stmt->execute([
                ":userid" => $id
            ]);
        }
    }

    public function updateUser($username, $password) {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "UPDATE ". $table . " SET username = :username, password = :password";
            $sql .= " WHERE lastname = 'Glatzel'";
            $stmt = $this->pdo->query($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
        }
    }

    public function getUsers() {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " ORDER BY userid";
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public function getUser($id) {
        $table = "users";
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " WHERE userid = :userid";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":userid", $id);
                $stmt->execute();
                return $stmt->fetch();
            } else {
                echo "Kein User mit der ID: $id gefunden !";
            }
        }
    }
}
