<?php

$dsn = "mysql:host=s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;port=3306;dbname=szkxb7ct1fwgse6d";
$username = "ogaic1ypob79nncp";
$password = "swvruoxd0liezltn";

try {
     $db = new PDO($dsn, $username, $password);
     // Set additional options if needed
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     echo "Connected successfully!";
} catch (PDOException $e) {
     die("Connection error: " . $e->getMessage());
}


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
