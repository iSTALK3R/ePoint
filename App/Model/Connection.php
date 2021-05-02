<?php

namespace App\Model;

use \PDO;

class Connection
{
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=localhost:3306; dbname=mponto; charset=utf8;", 'root', '');
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}