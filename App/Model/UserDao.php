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

    public function inUse($username) {
        $users = $this->listAll();

        foreach ($users as $user) {
            if ($user["username"] == $username) {
                return true;
            }
        }

        return false;
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

    public function listById() {
        $id = $this->user->getId();

        $query = "SELECT * FROM users WHERE id = :id";
        
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function inserirFuncionario() {
        $data = [
            "name"  => $this->user->getName(),
            "user"  => $this->user->getUsername(),
            "pass"  => $this->user->getPasswd(),
            "birth" => $this->user->getBirthDate(),
            "setor" => $this->user->getSetor(),
            "cpf"   => $this->user->getCpf(),
            "crat"  => $this->user->getCreatedAt(),
            "upat"  => $this->user->getUpdatedAt()
        ];

        

        $query = "INSERT INTO users (name, username, password, birth_date, setor, cpf, created_at, updated_at)
        VALUES (:name, :user, :pass, :birth, :setor, :cpf, :crat, :upat)";
            
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(':name',   $data["name"]);
        $stmt->bindParam(':user',   $data["user"]);
        $stmt->bindParam(':pass',   $data["pass"]);
        $stmt->bindParam(':birth',   $data["birth"]);
        $stmt->bindParam(':setor',  $data["setor"]);
        $stmt->bindParam(':cpf',    $data["cpf"]);
        $stmt->bindParam(':crat',   $data["crat"]);
        $stmt->bindParam(':upat',   $data["upat"]);

        $exec = $stmt->execute();

        if ($exec) {
            return true;
        } else {
            return false;
        }
    }
}