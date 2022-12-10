<?php
namespace App\User;
use App\App\AbstractMVC\AbstractDatabase;
use App\User\MVC\UserModel;
use PDO;

class UserDatabase extends AbstractDatabase {


    function getTable()
    {
        return "users";
    }

    function getModel()
    {
        return UserModel::class;
    }

    public function newUser($firstname, $lastname, $username, $mail, $password) {
        $table = $this->getTable();
        if (!empty($this->pdo)) {
            $sql = "INSERT INTO " . $table . " (firstname, lastname, username, mail, password, bio)";
            $sql .= " VALUES (:firstname, :lastname, :username, :mail, :password, :bio)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ":username" => $username,
                ":mail" => $mail,
                ":password" => $password,
                ":bio" => ""
            ]);
        }
    }

    public function new2User() {
        $table = $this->getTable();
        if (!empty($this->pdo)) {
            $sql = "INSERT INTO ". $table . "(userid, firstname, lastname, username, mail, password, bio)";
            $sql .= " VALUES (NULL, 'Robert', 'Glatzel', 'glatzel09', 'glatzel@hsv.de', 'glatzel12345', 'Stürmer')";
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
        }
    }

    public function deleteUser($id) {
        $table = $this->getTable();
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
        $table = $this->getTable();
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
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " ORDER BY userid";
            $stmt = $this->pdo->query($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }
    }

    public function getUser($id) {
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " WHERE userid = :userid";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":userid", $id);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
                return $stmt->fetch(PDO::FETCH_CLASS);
            } else {
                echo "Kein User mit der ID: $id gefunden !";
            }
        }
    }

    public function getUserByEmail($mail) {
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " WHERE mail = :mail";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":mail", $mail);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
                return $stmt->fetch(PDO::FETCH_CLASS);
            }
        }
    }
}
