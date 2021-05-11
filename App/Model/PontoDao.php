<?php

namespace App\Model;

use \App\Database\Connection;

class PontoDao
{
    private $ponto;
    private $instance;

    public function __construct(Ponto $ponto) {
        $this->ponto = $ponto;
        $this->instance = Connection::getInstance();
    }

    public function pontoCheck($ponto) {
        $uid = $this->ponto->getIdFuncionario();

        $query = "SELECT * FROM pontos WHERE users_id = :uid";

        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(":uid", $uid);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $result = [];
        }

        $data_atual = date("Y-m-d");

        for ($i = 0; $i < count($result); $i++) {
            if ($result[$i]["data"] == $data_atual && $result[$i]["type"] == $ponto) {
                return true;
            }
        }

        return false;
    }

    public function listAllRegs() {
        $query = "SELECT * FROM pontos AS P INNER JOIN users U ON P.users_id = U.id";

        $stmt = $this->instance->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } else {
            return [];
        }
    }

    public function baterPonto() {
        $data = [
            "id_funcionario"    => $this->ponto->getIdFuncionario(),
            "tipo"              => $this->ponto->getTipo(),
            "data"              => $this->ponto->getData(),
            "hora"              => $this->ponto->getHora()
        ];

        $query = "INSERT INTO pontos (users_id, type, data, hora) 
                    VALUES (:id_funcionario, :tipo, :data, :hora)";
        
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(":id_funcionario", $data["id_funcionario"]);
        $stmt->bindParam(":tipo", $data["tipo"]);
        $stmt->bindParam(":data", $data["data"]);
        $stmt->bindParam(":hora", $data["hora"]);
        
        $stmt->execute();

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }
}