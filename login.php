<?php include './login.html' ?>

<?php
    $servername = "localhost";
    $sql = "SELECT login, password FROM `users` WHERE 1";
    $result = mysqli_query($conn, $sql);
?>
