<?php
$json = '{"name":"Jude","age":22,"email":"08jude@gmail.com"}';

$object = json_decode($json);
$array = json_decode($json, true);

echo "Object: ";
echo $object->name;
echo "<br>";

echo "Array: ";
echo $array["email"];
?>