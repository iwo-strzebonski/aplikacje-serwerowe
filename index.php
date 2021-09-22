<?php
    ob_start();
    session_start();
?>

<?php
    include './index.html';
    // echo '<br>';
    // echo '<br>';
    // include './test.php';
    if (!isset($_SESSION['username'])) {
        include './login.php';
        include './register.php';
    } else {
        include './logout.html';
    }
?>


