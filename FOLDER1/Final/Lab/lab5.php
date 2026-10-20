<?php
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json);

$name = $data->name;

$response = array(
    "status" => "success",
    "message" => "Welcome, " . $name . "!"
);

echo json_encode($response);
?>
