<?php
// $servername = 'localhost';
// $sql = 'SELECT login, password FROM `users` WHERE 1';
// $result = mysqli_query($conn, $sql);
?>

<?php
$msg = '';

if (isset($_POST['username']) && !empty($_POST['username']) 
    && !empty($_POST['password'])) {

    if ($_POST['username'] == 'abc' && 
        $_POST['password'] == 'abc') {

        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'abc';

        $msg = 'You have entered valid use name and password';
    } else {
        echo 'Wrong username or password';
    }
}
?>

<div class='container' id='register' style='display:none;'>
    <h4><?php echo $msg; ?></h4>

    <form role='form' method='post' action='<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>' >
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
        <button onclick='document.getElementById("register").style.display="none";document.getElementById("login").style.display="block";'>
            Zaloguj się
        </button>
    </span>
</div>
