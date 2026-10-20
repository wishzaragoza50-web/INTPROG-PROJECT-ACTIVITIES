<?php
$json = file_get_contents('php://input');

$data = json_decode($json);

echo "Username: ";
echo $data->username;
echo "<br>";

echo "Password: ";
echo $data->password;
?>
