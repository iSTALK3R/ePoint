<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct() {
        parent::__construct("users", ["username", "name", "passwd"], "idusers");
    }
}