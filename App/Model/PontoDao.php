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

    public function listAllRegs() {
        $query = "SELECT * FROM pontos AS P INNER JOIN users U ON P.id_funcionario = U.id";

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
            "data_hora"         => $this->ponto->getDataHora()
        ];

        $query = "INSERT INTO pontos (id_funcionario, tipo, data_hora) 
                    VALUES (:id_funcionario, :tipo, :data_hora)";
        
        $stmt = $this->instance->prepare($query);
        $stmt->bindParam(":id_funcionario", $data["id_funcionario"]);
        $stmt->bindParam(":tipo", $data["tipo"]);
        $stmt->bindParam(":data_hora", $data["data_hora"]);
        
        $stmt->execute();

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }
}