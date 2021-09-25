<?php
    include './php/middleware/post.php';

    libxml_use_internal_errors(true);
?>

<!DOCTYPE html>
<html lang='pl'>
<?php include './html/head.html' ?>

<body>
    <header>
        <h1>Kino Pod Trzema Kuflami</h1>
        <div id='sess-btn-cont'>
            <?php
            if (isset($_SESSION['valid']) && $_SESSION['valid']) {
                echo '<span id="username">Witaj '.$_SESSION['login'].'!</span>';
                echo '<button class="session-btn logout">Wyloguj się</button>';
            } else {
                echo '<button class="session-btn register">Zarejestruj się</button>';
                echo '<button class="session-btn login">Zaloguj się</button>';
            }
            ?>
        </div>
    </header>

    <main>
        <?php
        if (!(isset($_SESSION['valid']) && $_SESSION['valid'])) {
            include './php/login.php';
            include './php/register.php';
        }
        ?>

        <?php
        $sql = "SELECT `title`, `poster` FROM `shows`";

        $query = mysqli_query($conn, $sql);

        foreach ($query as $row => $record) {
            echo '<a href="./reservation.php?show='.$record['title'].'" class="show">'
                . '<h3>'.$record['title'].'</h3>'
                . '<img src="./img/'.$record['poster'].'" />'
                .'</a>';
        }
        ?>
    </main>

    <?php include './html/footer.html' ?>
</body>
</html>
