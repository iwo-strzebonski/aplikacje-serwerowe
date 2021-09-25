<div class='container' id='login' style='display:<?= isset($_SESSION['valid']) && !$_SESSION['valid'] ? "flex" : "none"; ?>'>
    <h4><?= isset($_SESSION['valid']) && !$_SESSION['valid'] ? 'Nieprawidłowa nazwa użytkownika i/lub hasło' : '' ?></h4>

    <img src='./img/cancel.svg' class='close' />

    <form role='form' method='POST' action='<?= htmlspecialchars($_SERVER['PHP_SELF']).(isset($_GET['show']) ? $_GET['show'] : ''); ?>' >
        <?php include './html/login-form.html'; ?>
    </form>

    <?php include './html/register.html'; ?>
</div>
