<?php
include 'db.php';

$sql = "INSERT INTO `person` (`id`, `name`, `surname`, `age`) VALUES (NULL, '".$_POST['name']."', '".$_POST['surname']."', '".$_POST['age']."')";

mysqli_query($conn, $sql);
?>
