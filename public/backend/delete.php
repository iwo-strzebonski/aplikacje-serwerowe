<?php
include 'db.php';

$sql = "DELETE FROM `person` WHERE `person`.`id` = ".$_POST['id'];

mysqli_query($conn, $sql);
?>
