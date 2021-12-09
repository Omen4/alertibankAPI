<?php

class Database
{
    //Parameters
    private $host = ' ars-virtualis.org';
    private $db_name = 'bank_app';
    private $username = 'bank_app';
    private $password = 'XnJjkZKNnMHInk7XPiIXwopoQELJeJVBIZhOOO8fDGnS2SIJcl6iYYub5LwPfVX';
    private $conn;

    //Connection
    public function connect()
    {
        $this->conn = null;
        //Using PDO tu connect

        try {
            $this->conn = new PDO(
                'postgres:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $PDOException) {
            echo 'Connection Error: ' . $PDOException->getMessage();
        }
    }
}
