<?php
ob_start();
session_start();
?>

<?php
// $servername = 'localhost';
// $sql = 'SELECT login, password FROM `users` WHERE 1';
// $result = mysqli_query($conn, $sql);
?>

<?php // Login
if (isset($_POST['login']) &&
    !isset($_POST['phone']) &&
    !empty($_POST['login']) &&
    !empty($_POST['password'])) {

    if ($_POST['login'] == 'abc' && 
        $_POST['password'] == 'abc') {

        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['login'] = 'abc';
    } else {
        $_SESSION['valid'] = false;
    }
}
?>
