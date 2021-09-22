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

<div class='container' id='login' style='display:none;'>
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

        <input type='submit' value='Zaloguj się' />
    </form>

    <span>
        Potrzebujesz utworzyć konto?
        <button onclick='document.getElementById("login").style.display="none";document.getElementById("register").style.display="block";'>
            Zarejestruj się
        </button>
    </span>
</div>
