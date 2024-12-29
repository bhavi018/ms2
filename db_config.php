<?php

$host = "localhost";  // Host name
$user = "root";       // Username
$password = "";       // Password
$db = "bank";         // Database name

// Create a new connection
$conn = new mysqli($host, $user, $password, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
