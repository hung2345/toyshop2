<?php

$dsn = "s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	;dbname=mciszm142ho9bdsl";
$username = "xlhesq94xvzyf60h";
$dbPassword = "amxptd4snfzgsxo3";

try {
  $conn = new PDO($dsn, $username, $password);
  echo "Database connection successful.\n"; 
} catch (PDOException $e) {
  die("Connection error: " . $e->getMessage());
}


$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll();

foreach ($results as $result) {
  echo $result['name'] . " " . $result['email'] . "\n";
}

$conn = null;
