<?php

namespace App\Database;

use \PDO;

class Connection
{
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=".HOST."; dbname=".NAME."; charset=".CHAR.";", USER, PASS);
            } catch (PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}