<?php
ob_start();
session_start();
?>

<?php
$server = 'localhost';
$login = 'root';
$password = '';
$db = 'kino';

$conn = mysqli_connect($server, $login, $password, $db);
?>

<?php // Login
if (isset($_POST['login']) &&
    !isset($_POST['phone']) &&
    !empty($_POST['login']) &&
    !empty($_POST['password'])) {
        $sql = "SELECT 1 AS `exists`\n"
            . "FROM `users`\n"
            . "WHERE\n"
            . "STRCMP(`login`,'".$_POST['login']."') LIKE 0 AND\n"
            . "STRCMP(`password`,0x".md5($_POST['password'], false).") LIKE 0";

        $query = mysqli_query($conn, $sql);
        
        foreach ($query as $key => $value) {
            if ($value['exists']) {
                $_SESSION['valid'] = true;
                $_SESSION['login'] = $_POST['login'];
                return;
            }
        }

    $_SESSION['valid'] = false;
}
?>

<?php // Register
if (isset($_POST['login']) &&
    !empty($_POST['login']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['password'])) {
        $sql = "SELECT 1 AS `exists`\n"
            . "FROM `users`\n"
            . "WHERE\n"
            . "STRCMP(`login`,'".$_POST['login']."') LIKE 0 OR\n"
            . "STRCMP(`phone`,".$_POST['phone'].") LIKE 0";

        $query = mysqli_query($conn, $sql);
        
        foreach ($query as $key => $value) {
            if ($value['exists']) {
                $reg_msg = 'Użytkownik o podanych danych już istnieje w systemie!';
                return;
            }
        }

        $reg = "INSERT INTO `users` (`id`, `login`, `password`, `phone`)"
            . "VALUES (NULL,'" . $_POST['login'] . "',0x" . md5($_POST['password'], false) . "," . $_POST['phone'] . ")";

        mysqli_query($conn, $reg);
}
?>
