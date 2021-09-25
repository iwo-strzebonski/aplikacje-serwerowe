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
                echo '<span>Witaj '.$_SESSION['login'].'!</span>';
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

        <div id='reservation'>
            <form role='form' method='POST' action='<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>'>
                <?php
                $sql = "SELECT `seat` FROM `seats` WHERE `title` LIKE '".$_GET['show']."'";

                $query = mysqli_query($conn, $sql);
                $reserved = array();

                foreach ($query as $row => $record) {
                    array_push($reserved, $record['seat']);
                }

                // foreach ($reserved as $key => $value) {
                //     echo $key.' - '.$value.'<br>';
                // }

                for ($r = 1; $r <= 15; $r++) { 
                    for ($c = 1; $c <= 20; $c++) {
                        if (in_array($r.'-'.$c, $reserved)) {
                            echo '<input type="radio" name="seat" class="disabled" disabled="" />';
                        } else {
                            echo '<input type="radio" name="seat" id="'.$r.'-'.$c.'" value="'.$r.'-'.$c.'" />';
                        }
                        echo '<label for="'.$r.'-'.$c.'" ></label>';
                    }
                    echo '<br>';
                }
                ?>
            </form>
        </div>
    </main>

    <?php include './html/footer.html' ?>
</body>
</html>
