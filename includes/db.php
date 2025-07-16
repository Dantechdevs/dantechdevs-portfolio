<?php
$host = 'localhost';
$user = 'root';         // or your DB username
$pass = '';             // or your DB password
$dbname = 'daniel_portfolio';

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}