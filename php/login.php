<div class='container' id='login' style='display:<?= isset($_SESSION['msg']) || (isset($_SESSION['valid']) && !$_SESSION['valid']) ? 'flex' : 'none'; ?>' >
    <h4>
    <?php
    if (isset($_SESSION['valid']) && !$_SESSION['valid']) {
        echo 'Nieprawidłowa nazwa użytkownika i/lub hasło';
    } elseif (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    } else {
        echo '';
    }

    $href = $_SERVER['PHP_SELF'];
    ?></h4>

    <img src='./img/cancel.svg' class='close' />

    <?php include './php/form-redirect.php' ?>

    <form role='form' method='POST' action='<?= htmlspecialchars($href) ?>' >
        <?php include './html/login-form.html'; ?>
    </form>

    <?php include './html/register.html'; ?>
</div>
