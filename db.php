<?php
$host = 'localhost';
$user = 'root';
$password = 'root123';
$database = 'user_management';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
