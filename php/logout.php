<?php
    session_start();
    session_destroy();

    echo 'Użytkownik został wylogowany';
    header('Refresh: 0; URL="../index.php"');
?>
