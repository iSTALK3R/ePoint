<?php

namespace App\Model;

class Ponto
{
    private $id;
    private $idFuncinario;
    private $tipo;
    private $dataHora;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdFuncionario() {
        return $this->id_funcinario;
    }

    public function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = $idFuncionario;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getDataHora() {
        return $this->dataHora;
    }

    public function setDataHora($dataHora) {
        $this->dataHora = $dataHora;
    }
}
