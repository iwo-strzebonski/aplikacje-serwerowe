<div class='container' id='register' style='display:<?= isset($reg_msg) ? "flex" : "none"; ?>'>
    <h4><?= isset($reg_msg) ? $reg_msg : ''; ?></h4>

    <img src='./img/cancel.svg' class='close' />

    <form role='form' method='POST' action='<?= htmlspecialchars($_SERVER['PHP_SELF']).(isset($_GET['show']) ? $_GET['show'] : ''); ?>' >
        <?php include './html/register-form.html'; ?>
    </form>

    <?php include './html/login.html'; ?>
</div>
