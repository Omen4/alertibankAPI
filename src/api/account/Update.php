<?php

use config\DbConnection;
use daos\AccountDao;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$dbConnection = new DbConnection();
$db = $dbConnection->getConnection();

$item = new AccountDao($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

// account values
$item->wording = $data->wording;
$item->balance = $data->balance;
$item->overdraft = $data->overdraft;

if ($item->updateAccount()) {
    echo json_encode("Employee data updated.");
} else {
    echo json_encode("Data could not be updated");
}
