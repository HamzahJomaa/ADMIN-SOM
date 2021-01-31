<?php

$host = "localhost";
$username = "adalanco_admin";
$password = "[QAyic8P(!Br";
$db = "adalanco_stateofmind";

$conn = new mysqli($host, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
}
