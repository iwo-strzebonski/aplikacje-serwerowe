<?php
$server = 'localhost';
$login = 'root';
$password = '';
$db = 'istrzebonski';

$conn = mysqli_connect($server, $login, $password, $db);

mysqli_query($conn, "SET NAMES 'UTF8'")
?>
