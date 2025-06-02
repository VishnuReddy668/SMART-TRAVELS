<?php
// Database configuration
$servername = "localhost";    // or your server name, e.g., "127.0.0.1"
$username = "root";  // replace with your MySQL username
$password = "";  // replace with your MySQL password
$dbname = "destination";    // replace with your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
