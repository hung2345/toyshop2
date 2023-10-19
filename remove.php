<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: process-staff-login.php");
    exit;
}

$dsn = "mysql:host=localhost;dbname=toyshop";
$dbUsername = "root";
$dbPassword = "";

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
