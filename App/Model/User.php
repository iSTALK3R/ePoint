<?php

namespace App\Model;

class User
{
    public function listAll() {
        $conn = Connection::getInstance();
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();

        $result = $stmt->fetchAll();

        if (!$result) {
            return false;
        }

        return $result;
    }

    public function insert($name, $username, $passwd, $created_at, $updated_at) {
        $conn = Connection::getInstance();
        $stmt = $conn->prepare("INSERT INTO users VALUES (name = :name, username = :username, passwd = :passwd, created_at = :cat, updated_at = :uat)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":passwd", $passwd);
        $stmt->bindParam(":cat", $created_at);
        $stmt->bindParam(":uat", $updated_at);

        $exec = $stmt->execute();

        if (!$exec) {
            return false;
        }
        
        return $exec;
    }
}