<?php

namespace App\Model;

class User
{
    private $id;
    private $name;
    private $username;
    private $passwd;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPasswd() {
        return $this->passwd;
    }

    public function setPasswd($passwd) {
        $this->passwd = $passwd;
    }
}