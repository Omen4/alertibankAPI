<?php

class Database
{
    //Parameters
    private $host = 'localhost';
    private $db_name = 'myblog';
    private $username = 'root';
    private $password = 'root';
    private $conn;

    //Connection
    public function connect()
    {
        $this->conn = null;
        //Using PDO tu connect

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $PDOException) {
            echo 'Connection Error: ' . $PDOException->getMessage();
        }
    }
}
