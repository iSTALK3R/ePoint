<?php

namespace App\Model;

class Ponto
{
    private $id;
    private $idFuncionario;
    private $tipo;
    private $data;
    private $hora;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdFuncionario() {
        return $this->idFuncionario;
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

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }
}
