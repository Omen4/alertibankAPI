<?php

namespace config;

use PDO;
use PDOException;

class DbConnection
{
    public $connection;

    public function getConnection()
    {
        $dbConfig = include("../../src/config/dbConfig.php");

        $this->connection = null;
        try {
            $this->connection = new PDO("pgsql:host=" . $dbConfig['host'] . ";dbname=" . $dbConfig['db_name'], $dbConfig['username'], $dbConfig['password']);
            $this->connection->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->connection;
    }
}
