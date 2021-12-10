<?php

use daos\ClientDao;
use daos\DbConnection;


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/employees.php';

$dbConnection = new DbConnection();
$db = $dbConnection->getConnection();

$item = new ClientDao($db);

$data = json_decode(file_get_contents("php://input"));

$item->name = $data->name;
$item->email = $data->email;
$item->password = $data->password;

if ($item->createClient()) {
    echo 'Client created successfully.';
} else {
    echo 'Client could not be created.';
}
