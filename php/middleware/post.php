<?php
include './php/connection/session-start.php';
include './php/connection/db.php';
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
if (isset($_SESSION['valid']) &&
    isset($_POST['buy']) &&
    isset($_POST['show']) &&
    isset($_POST['seat']) &&
    isset($_POST['show_dt']) &&
    $_SESSION['valid']) {
        foreach ($_POST['seat'] as $i => $seat) {
            $sql = "INSERT INTO `seats` (`id`, `title`, `login`, `seat`, `show_dt`)"
                . "VALUES (NULL,'".addslashes($_POST['show'])."','".$_SESSION['login']."','".$seat."','".addslashes($_POST['show_dt'])."')";

            mysqli_query($conn, $sql);
        }

        header('Refresh: 0; URL="'.dirname($_SERVER['PHP_SELF']).'"');
} elseif (isset($_POST['buy']) && !isset($_SESSION['valid']) || (isset($_SESSION['valid']) && !$_SESSION['valid'])) {
    $_SESSION['msg'] = 'Żeby móc kupić bilet, musisz się najpierw zalogować!';
    print_r($_SERVER);

    header('Refresh: 5; URL="'.$_SERVER['HTTP_REFERER'].'"');
} elseif (isset($_POST['buy'])) {
    echo '<h1>Ups, coś poszło nie tak!</h1>';
    echo '<h2>Spróbuj ponownie</h2>';

    header('Refresh: 2; URL="'.dirname($_SERVER['PHP_SELF']).'"');
}
?>
