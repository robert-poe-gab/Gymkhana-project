<?php

namespace Models;

class Db {

    private $db;

    public function __construct($user, $password, $dbName, $host = '127.0.0.1', $port = 3306)
    {
        $dsn = "mysql:dbname=$dbName;host=$host;port=$port";
        try {
            $this->db = new \PDO($dsn, $user, $password);
        } catch (\PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

    public function getDb(){
        return $this->db;
    }
}