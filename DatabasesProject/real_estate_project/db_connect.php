<?php
// Database connection
$host = "localhost";
$user = "root";
$password = ""; // Leave blank if no password
$database = "real_estate";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
