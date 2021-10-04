<header>
    <h1><a href='.'>Kino Pod Trzema Kuflami</a></h1>
    <div id='sess-btn-cont'>
        <?php
        if (isset($_SESSION['valid']) && $_SESSION['valid']) {
            echo '<span>Witaj <i style="text-decoration: underline double;">'.$_SESSION['login'].'</i>!</span>';
            echo '<button class="session-btn logout">Wyloguj się</button>';
        } else {
            echo '<button class="session-btn register">Zarejestruj się</button>';
            echo '<button class="session-btn login">Zaloguj się</button>';
        }
        ?>
    </div>
</header>
