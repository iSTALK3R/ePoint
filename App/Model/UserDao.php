<?php

namespace App\Model;

use \App\Database\Connection;

class UserDao
{
    private $user;
    private $instance;

    public function __construct(User $user) {
        $this->user = $user;
        $this->instance = Connection::getInstance();
    }

    public function listAll() {
        $query = "SELECT * FROM users";

        $stmt = $this->instance->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function listById($id) {
        $query = "SELECT * FROM users WHERE id = :id";
        
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function inserirFuncionario() {
        $data = [
            "name" => $this->user->getName(),
            "user" => $this->user->getUsername(),
            "pass" => $this->user->getPasswd(),
            "crat" => date('Y-m-d H:i:s'),
            "upat" => date('Y-m-d H:i:s')
        ];

        $query = "INSERT INTO users (name, username, passwd, created_at, updated_at)
        VALUES (:name, :user, :pass, :crat, :upat)";
            
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(':name', $data["name"]);
        $stmt->bindParam(':user', $data["user"]);
        $stmt->bindParam(':pass', $data["pass"]);
        $stmt->bindParam(':crat', $data["crat"]);
        $stmt->bindParam(':upat', $data["upat"]);

        $exec = $stmt->execute();

        if ($exec) {
            return true;
        } else {
            return false;
        }
    }
}