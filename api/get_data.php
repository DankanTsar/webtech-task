<?php

global $conn;

require("../model/dbconnect.php");

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    $sql = "SELECT name, phone, email, section, COALESCE(birthdate, 'Не указана') as birthdate, report, IF(reportName != '', reportName, 'Не указана') as reportName FROM webtech.users";
    $result = $conn->query($sql);
    $res = array();

    while ($row = $result->fetch_assoc())
        $res[] = $row;

    echo json_encode($res);
}
