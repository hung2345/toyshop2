<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: process-staff-login.php");
    exit;
}

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
    $conn = new PDO($dsn, $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}


if (isset($_GET['ToyID'])) {
    $ToyID = $_GET['ToyID'];

 
    $stmt = $conn->prepare("DELETE FROM toy WHERE ToyID = :ToyID");
    $stmt->bindParam(':ToyID', $ToyID);
    $stmt->execute();

    header("Location: clientforstaff.php");
    exit;
} else {
    echo "Invalid infomation product.";
    exit;
}
