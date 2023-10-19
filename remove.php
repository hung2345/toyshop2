<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: process-staff-login.php");
    exit;
}

$dsn = "s29oj5odr85rij2o.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	;dbname=mciszm142ho9bdsl";
$username = "xlhesq94xvzyf60h";
$dbPassword = "amxptd4snfzgsxo3";

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
