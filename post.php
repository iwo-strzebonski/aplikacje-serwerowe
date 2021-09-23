<?php
ob_start();
session_start();
?>

<?php
// echo md5('abc', true); // 0x900150983cd24fb0d6963f7d28e17f72
// echo md5('abc', false); // "900150983cd24fb0d6963f7d28e17f72"
$server = 'localhost';
$login = 'root';
$password = '';
$db = 'kino';

$conn = mysqli_connect($server, $login, $password, $db);
$sql = 'SELECT * FROM `users` WHERE 1';
$res = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

<?php // Login
if (isset($_POST['login']) &&
    !isset($_POST['phone']) &&
    !empty($_POST['login']) &&
    !empty($_POST['password'])) {

        foreach ($res as $key => $row) {

            if ($_POST['login'] == $row['login'] && 
            md5($_POST['password'], true) == $row['password']) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login'] = $_POST['login'];
                return;
            }
        }

    $_SESSION['valid'] = false;
}
?>

<?php // Register
if (isset($_POST['login']) &&
    isset($_POST['phone']) &&
    !empty($_POST['login']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['password'])) {

        foreach ($res as $key => $row) {

            if ($_POST['login'] == $row['login'] && 
            md5($_POST['password'], true) == $row['password']) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['login'] = $_POST['login'];
                return;
            }
        }

    $_SESSION['valid'] = false;
}
?>
