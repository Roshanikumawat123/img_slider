<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'image';

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>