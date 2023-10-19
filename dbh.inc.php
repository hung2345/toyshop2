<?php

$dsn = "mysql:host=s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=erf4p42dq0r2dxvv";
$username = "h9h1633x6ek8iw6v";
$password = "fjyr5bd0t2ypluj6";


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
