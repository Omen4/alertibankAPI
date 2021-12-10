<?php

namespace daos;

use config\DbConnection;
use models\Account;
use PDO;

class AccountDao extends DbConnection
{
    private $conn;
    private $db_table = "accounts";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GET
    public function getAccounts()
    {
        $sqlQuery = "SELECT id, wording, balance, overdraft, client_id FROM " . $this->db_table . ";";
        $statement = $this->conn->prepare($sqlQuery);
        $statement->execute();
        if (next($statement)) {
            $accountList = [];
            foreach ($statement as $iterator => $client) {
                $accountList[] = new Account($statement['id'], $statement['wording'], $statement['balance'], $statement['overdraft'], $statement['client_id']);
            }
            return $accountList;
        } else {
            return new Account($statement['id'], $statement['wording'], $statement['balance'], $statement['overdraft'], $statement['client_id']);
        }
//        return $statement;
    }

    //CREATE
    public function createAccount()
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . " SET wording = :wording, balance = :balance, overdraft = :overdraft, client_id = :client_id";

        $statement = $this->conn->prepare($sqlQuery);

        $this->wording = htmlspecialchars(strip_tags($this->wording));
        $this->balance = floatval($this->balance);
        $this->overdraft = floatval($this->overdraft);
        $this->id_client = intval($this->id_client);

        $statement->bindParam(":wording", $this->wording);
        $statement->bindParam(":balance", $this->balance);
        $statement->bindParam(":overdraft", $this->overdraft);
        $statement->bindParam(":id_client", $this->id_client);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    // READ single
    public function getSingleAccount()
    {
        $sqlQuery = "SELECT id, wording, balance, overdraft, client_id FROM " . $this->db_table . " WHERE id = ? LIMIT 0,1";

        $statement = $this->conn->prepare($sqlQuery);

        $statement->bindParam(1, $this->id);

        $statement->execute();

        $dataRow = $statement->fetch(PDO::FETCH_ASSOC);

        $this->wording = $dataRow['wording'];
        $this->balance = $dataRow['balance'];
        $this->overdraft = $dataRow['overdraft'];
        $this->client_id = $dataRow['client_id'];
    }

    // UPDATE
    public function updateAccount()
    {
        $sqlQuery = "UPDATE " . $this->db_table . " SET wording = :wording, balance = :balance, overdraft = :overdraft, client_id = :client_id WHERE id = :id";

        $statement = $this->conn->prepare($sqlQuery);

        $this->wording = htmlspecialchars(strip_tags($this->wording));
        $this->balance = floatval($this->balance);
        $this->overdraft = floatval($this->overdraft);
        $this->id_client = intval($this->id_client);

        $statement->bindParam(":wording", $this->wording);
        $statement->bindParam(":balance", $this->balance);
        $statement->bindParam(":overdraft", $this->overdraft);
        $statement->bindParam(":id_client", $this->id_client);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
    function deleteAccount()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $statement = $this->conn->prepare($sqlQuery);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(1, $this->id);

        if ($statement->execute()) {
            return true;
        }
        return false;
    }
}