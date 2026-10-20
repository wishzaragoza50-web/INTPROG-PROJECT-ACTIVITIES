<?php
header('Content-Type: application/json');

$user = array(
    "id" => 24174987,
    "name" => "Jude",
    "email" => "08jude@gmail.com",
    "status" => "active"
);

echo json_encode($user);
?>
