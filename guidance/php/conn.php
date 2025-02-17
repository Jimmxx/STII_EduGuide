<?php
// Database connection
$servername = "localhost"; // Change if needed
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "stii_eduguide"; // Database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>