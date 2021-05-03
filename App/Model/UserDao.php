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
        try {
            $query = "SELECT * FROM users";
            $stmt = $this->instance->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() < 1) {
                echo "Nenhum dado encontrado";
            }

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $result;
        } catch (\Exception $e) {
            echo "Erro: " . $e->getMessage();

            return false;
        }
    }

    public function inserirFuncionario() {
        try {
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

            return true;
        } catch (\Exception $e) {
            throw new Exception("Não foi possível cadastrar o funcionário..." . $e->getMessage());
        }
    }
}