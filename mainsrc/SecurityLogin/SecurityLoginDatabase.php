<?php
namespace App\SecurityLogin;

use App\App\AbstractMVC\AbstractDatabase;

class SecurityLoginDatabase extends AbstractDatabase {

    function getTable()
    {
        return "securitytokens";
    }

    function getModel()
    {
        return SecurityLoginModel::class;
    }

    public function newStayin($userid, $identifier, $securitytoken) {
        $table = $this->getTable();
        if (!empty($this->pdo)) {
            $sql = "INSERT INTO " . $table . " (userid, identifier, securitytoken)";
            $sql .= " VALUES (:userid, :identifier, :securitytoken)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':userid' => $userid,
                ':identifier' => $identifier,
                ":securitytoken" => $securitytoken
            ]);
        }
    }

    public function getStayinData($identifier) {
        $table = $this->getTable();
        $model = $this->getModel();
        if (!empty($this->pdo)) {
            $sql = "SELECT * FROM ". $table . " WHERE identifier = :identifier";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":identifier", $identifier);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
                return $stmt->fetch(PDO::FETCH_CLASS);
            }
        }
    }
}