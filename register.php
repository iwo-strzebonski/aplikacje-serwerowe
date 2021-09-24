<div class='container' id='register' style='display:<?= isset($reg_msg) ? "flex" : "none"; ?>'>
    <h4><?= isset($reg_msg) ? $reg_msg : ''; ?></h4>

    <img src='./cancel.svg' class='close' />

    <form role='form' method='POST' action='<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>' >
        <label for='login'>Nazwa użytkownika</label>
        <br />
        <input type='text' name='login' required='' />
        <br />

        <label for='password'>Hasło</label>
        <br />
        <input type='password' name='password' required='' />
        <br />
        
        <label for='phone'>Numer telefonu</label>
        <br />
        <input type='tel' id='phone' name='phone' required='' 
            pattern='[0-9]{3}[0-9]{3}[0-9]{3}' />
        <br />
    
        <input type='submit' value='Zarejestruj się'/>
    </form>

    <span>
        Masz już konto?
        <button class='session-btn login'>
            Zaloguj się
        </button>
    </span>
</div>
