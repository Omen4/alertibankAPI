<?php

 class DbConnectionSingleton
{
    public function connect()
    {
        $this->conn = null;
        $dbConfig = include("./src/config.php");

        try {
            $this->conn = new PDO(
                'postgres:host=' . $dbConfig['host'] . ';dbname=' . $dbConfig['db_name'],
                $dbConfig['username'],
                $dbConfig['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $PDOException) {
            echo 'connection Error: ' . $PDOException->getMessage();
        }
    }
}
