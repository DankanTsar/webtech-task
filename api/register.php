<?php

global $conn;

require("../model/dbconnect.php");
//include "";

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $name = $conn->real_escape_string(htmlspecialchars($data['name']));
    $phone = $conn->real_escape_string(htmlspecialchars($data['phone']));
    $email = $conn->real_escape_string(htmlspecialchars($data['email']));
    $section = $conn->real_escape_string(htmlspecialchars($data['section']));
    $birthdate = $conn->real_escape_string(htmlspecialchars($data['birthdate']));
    $report = $data['report'] ? 0 : 1;
    $reportName = $conn->real_escape_string(htmlspecialchars($data['reportName']));;

    // регулярное выражение для проверки e-mail практически полностью соответствующее RFC 5322
    $re = '/(?:[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/m';
    if (!preg_match($re, $email) || strlen($email) > 320) {
        http_response_code(400);
        die();
    }

    $re = '/[А-яЁё ]/u';
    if (!preg_match($re, $name) || strlen($name) < 3 || strlen($name) > 100) {
        http_response_code(400);
        die();
    }

    $re = '/(^\+7)((\d{10}))$/m';
    if (!preg_match($re, $phone)) {
        http_response_code(400);
        die();
    }

    $sql = "INSERT INTO users ".
        "(`name`, `phone`, `email`, `section`, `birthdate`, `report`, `reportName`) "."VALUES ".
        "('$name', '$phone', '$email', '$section', NULLIF('$birthdate',''), '$report', '$reportName')";
    $result = $conn -> query($sql);

    if ($conn -> errno){
        http_response_code(500);
        die();
    }
    else
        echo json_encode(mysqli_insert_id($conn));
}
