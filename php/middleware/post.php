<?php
ob_start();
session_start();
?>

<?php
$server = 'localhost';
$login = 'root';
$password = '';
$db = 'istrzebonski';

$conn = mysqli_connect($server, $login, $password, $db);

mysqli_query($conn, "SET NAMES 'UTF8'")
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
            . "WHERE EXISTS (SELECT * FROM `users` WHERE\n"
            . "STRCMP(`login`,'".$_POST['login']."') LIKE 0 OR\n"
            . "STRCMP(`phone`,".$_POST['phone'].") LIKE 0)";

        $query = mysqli_query($conn, $sql);
        
        foreach ($query as $row => $record) {
            if ($record['exists']) {
                $reg_msg = 'Użytkownik o podanych danych już istnieje w systemie!';
                return;
            }
        }

        $sql = "INSERT INTO `users` (`id`, `login`, `password`, `phone`)"
            . "VALUES (NULL,'".$_POST['login'] . "',0x".md5($_POST['password'], false).",".$_POST['phone'].")";

        mysqli_query($conn, $sql);
}
?>

<?php // Buy ticket
if (strpos($_SERVER['PHP_SELF'], 'post') !== false) {
    if (isset($_SESSION['valid']) &&
        isset($_POST['show']) &&
        isset($_POST['seat']) &&
        $_SESSION['valid']) {
            foreach ($_POST['seat'] as $i => $seat) {
                $sql = "INSERT INTO `seats` (`id`, `title`, `login`, `seat`)"
                    . "VALUES (NULL,'".addslashes($_POST['show'])."','".$_SESSION['login']."','".$seat."')";

                mysqli_query($conn, $sql);
            }

            header('Refresh: 0; URL="../../index.php"');
    } elseif (!isset($_SESSION['valid']) || (isset($_SESSION['valid']) && !$_SESSION['valid'])) {
        $_SESSION['msg'] = 'Żeby móc kupić bilet, musisz się najpierw zalogować!';

        header('Refresh: 0; URL="'.$_SERVER['HTTP_REFERER'].'"');
    } else {
        echo '<h1>Ups, coś poszło nie tak!</h1>';
        echo '<h2>Spróbuj ponownie</h2>';

        header('Refresh: 2; URL="'.str_replace('php/middleware/post', 'index', $_SERVER['PHP_SELF']).'"');
    }
}
?>
