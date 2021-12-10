<?php

namespace daos;

use models\Client;
use PDO;

class ClientDao extends DbConnection
{
    private $conn;
    private $db_table = "clients";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET
    public function getClients()
    {
        $sqlQuery = "SELECT id, name, email, password FROM " . $this->db_table . ";";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->execute();
        if (next($statement)) {
            $clientsList = [];
            foreach ($statement as $iterator => $client) {
                $clientsList[] = new Client($statement['id'], $statement['name'], $statement['email'], $statement['password']);
            }
            return $clientsList;
        } else {
            return new Client($statement['id'], $statement['name'], $statement['email'], $statement['password']);
        }
//        return $statement;
    }

    //CREATE
    public function createClient()
    {
        $sqlQuery = "INSERT INTO" . $this->db_table . "SET name = :name, email = :email, password = :password";

        $statement = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":created", $this->password);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    // READ single
    public function getSingleClient()
    {
        $sqlQuery = "SELECT id, name, email, created FROM" . $this->db_table . "WHERE id = ? LIMIT 0,1";

        $statement = $this->conn->prepare($sqlQuery);

        $statement->bindParam(1, $this->id);

        $statement->execute();

        $dataRow = $statement->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->email = $dataRow['email'];
        $this->password = $dataRow['password'];
    }

    // UPDATE
    public function updateClient()
    {
        $sqlQuery = "UPDATE " . $this->db_table . " SET name = :name, email = :email, password = :password WHERE id = :id";

        $statement = $this->conn->prepare($sqlQuery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));


        $statement->bindParam(":name", $this->name);
        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":password", $this->password);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteClient()
    {
        $sqlQuery = "DELETE FROM" . $this->db_table . "WHERE id = ?";
        $statement = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(1, $this->id);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }
}