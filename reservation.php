<?php
    include './php/middleware/post.php';

    libxml_use_internal_errors(true);
?>

<!DOCTYPE html>
<html lang='pl'>
<?php include './html/head.html' ?>

<body>
    <?php include './php/header.php' ?>

    <main>
        <?php
        if (!(isset($_SESSION['valid']) && $_SESSION['valid'])) {
            include './php/login.php';
            include './php/register.php';
        }
        ?>
        <div id='show'>
            <?php
            $sql = "SELECT `title`, `poster`, `description` FROM `shows` WHERE `title` LIKE '".addslashes($_GET['show'])."'";
            $query = mysqli_query($conn, $sql);

            foreach ($query as $row => $record) {
                $title = $record['title'];
                $poster = $record['poster'];
                $desc = $record['description'];
                break;
            }
            ?>

            <h2><?= $title ?></h2>

            <img src='./img/posters/<?= $poster ?>' />

            <div id='description'>
                <?= $desc ?>
            </div>
        </div>

        <div id='reservation'>
            <h3>Wybierz miejsce:</h3>

            <form role='form' method='POST' action='<?= htmlspecialchars(str_replace('reservation','php/middleware/post', $_SERVER['PHP_SELF'])) ?>'>
                <?php
                $sql = "SELECT `seat` FROM `seats` WHERE `title` LIKE '".addslashes($_GET['show'])."'";

                $query = mysqli_query($conn, $sql);
                $reserved = array();

                foreach ($query as $row => $record) {
                    array_push($reserved, $record['seat']);
                }

                echo '<span><b class="column"></b>';
                for ($c = 1; $c <= 20; $c++) {
                    echo '<b class="column">'.$c.'</b>';
                }
                echo '</span><br>';

                for ($r = 1; $r <= 15; $r++) {
                    echo '<span><b class="row">'.$r.'</b>';
                    for ($c = 1; $c <= 20; $c++) {
                        if (in_array($r.'-'.$c, $reserved)) {
                            echo '<input type="checkbox" class="disabled" disabled="" />';
                        } else {
                            echo '<input type="checkbox" name="seat[]" id="'.$r.'-'.$c.'" value="'.$r.'-'.$c.'" />';
                        }
                        echo '<label for="'.$r.'-'.$c.'" ></label>';
                    }
                    echo '</span><br>';
                }
                ?>

                <input type='hidden' name='show' value="<?= $_GET['show'] ?>" />
                <input type='reset' value='Wyczyść' />
                <input type='submit' value='Kup bilet' />
            </form>
        </div>
    </main>

    <?php include './html/footer.html' ?>
</body>
</html>
