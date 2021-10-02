<?php
include 'db.php';

$sql = "UPDATE `person` SET `name` = '".$_POST['name']."', `surname` = '".$_POST['surname']."', `age` = '".$_POST['age']."' WHERE `person`.`id` = ".$_POST['id'];

mysqli_query($conn, $sql);
?>
