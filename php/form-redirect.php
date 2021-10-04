<?php
if (strpos($_SERVER['PHP_SELF'], 'reservation.php') !== false) {
    $href = substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], 'reservation.php'));
} elseif (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) {
    $href = $_SERVER['PHP_SELF'];
}
?>
