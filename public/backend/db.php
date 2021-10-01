<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'test';

$conn = new mysqli($server, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM person";

$result = mysqli_query($conn, $sql);

?>
