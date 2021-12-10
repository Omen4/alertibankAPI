<?php

use config\DbConnection;
use daos\ClientDao;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$dbConnection = new DbConnection();
$db = $dbConnection->getConnection();

$items = new ClientDao($db);

$statement = $items->getClients();
$itemCount = $items->rowCount();

echo json_encode($itemCount);
if ($itemCount > 0) {

    $clientsArray = array();
    $clientsArray["body"] = array();
    $clientsArray["itemCount"] = $itemCount;

    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "password" => $password,
        );

        $clientsArray["body"][] = $e;
    }
    echo json_encode($clientsArray);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
