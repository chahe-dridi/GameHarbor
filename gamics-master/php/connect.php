<?php
// Database credentials
$servername = "localhost"; // Change to your database server name
$username = "root"; // Change to your database username (usually "root" for XAMPP)
$password = ""; // Leave empty if no password is set by default in XAMPP
$dbname = "gameharbor"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
