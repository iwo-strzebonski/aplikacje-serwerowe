<?php
if (str_contains($_SERVER['PHP_SELF'], 'reservation.php')) {
    $href = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], 'reservation.php'));
} elseif (str_contains($_SERVER['PHP_SELF'], 'index.php')) {
    $href = $_SERVER['PHP_SELF'];
}
?>
