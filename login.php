<div class='container' id='login' style='display:<?= isset($_SESSION['valid']) && !$_SESSION['valid'] ? "flex" : "none"; ?>'>
    <?php
    if (isset($_SESSION['valid']) && !$_SESSION['valid']) {
        echo '<h4>Nieprawidłowa nazwa użytkownika i/lub hasło</h4>';
    }
    ?>

    <img src='./cancel.svg' class='close' />

    <form role='form' method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' >
        <label for='login'>Nazwa użytkownika</label>
        <br />
        <input type='text' name='login' required='' />
        <br />

        <label for='password'>Hasło</label>
        <br />
        <input type='password' name='password' required='' />
        <br />

        <input type='submit' value='Zaloguj się' />
    </form>

    <span>
        Potrzebujesz utworzyć konto?
        <button class='session-btn register'>
            Zarejestruj się
        </button>
    </span>
</div>
