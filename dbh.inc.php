<?php

$dsn = "s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=qgyyv66sajzo5orn";
$username = "lab1us2jro0sahrp";
$dbPassword = "dkrhfrnfumjp0h33";

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
