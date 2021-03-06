<?php

use config\DbConnection;
use daos\ClientDao;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dbConnection = new DbConnection();
$db = $dbConnection->getConnection();

$item = new ClientDao($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

$item->name = $data->name;
$item->email = $data->email;
$item->password = $data->password;

if ($item->updateClient()) {
    echo json_encode("Employee data updated.");
} else {
    echo json_encode("Data could not be updated");
}
