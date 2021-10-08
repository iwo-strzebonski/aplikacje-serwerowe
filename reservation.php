<?php
include './php/middleware/post.php';
?>

<!DOCTYPE html>
<html lang='pl'>

<?php include './html/head.html' ?>
<head>
    <script defer src='./js/reservation.js'></script>
</head>

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

            <h2><a href="./reservation.php?show=<?= addslashes($_GET['show']) ?>"><?= $title ?></a></h2>

            <img src='./img/posters/<?= $poster ?>' />

            <div id='description'>
                <?= $desc ?>
            </div>
        </div>

        <div id='reservation'>
            <?php
            if (isset($_GET['show_dt'])) include './php/seats.php';
            else include './php/dates.php';
            ?>
        </div>
    </main>

    <?php include './html/footer.html' ?>
</body>
</html>
