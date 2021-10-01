<?php
include 'db.php';

$response = array();

while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

$conn->close();

$api = json_encode($response);

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

echo $api;
?>
