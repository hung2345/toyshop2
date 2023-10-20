<?php

$host = "s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = 3306;
$database = "lm0ft0r9qtusvm42";
$username = "dolspoxwgf3anvkc";
$password = "vvvlinl8ngt5rjnp";

$dsn = "mysql:host={$host};port={$port};dbname={$database}";
$username = $username;
$password = $password;
 


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
