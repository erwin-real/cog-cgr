<?php


$servername = "localhost";
$username = "cogclark_cgr-admin";
$password = "j#J}6;%y85{1";
$dbname = "cogclark_cgr";

# MySQL with PDO_MYSQL
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$query = file_get_contents("test.sql");

$stmt = $db->prepare($query);

if ($stmt->execute())
    echo "Success";
else
    echo "Fail";

?>