<?php
    include './php/middleware/post.php';

    libxml_use_internal_errors(true);
?>

<!DOCTYPE html>
<html lang='pl'>
<?php include './html/head.html' ?>

<body>
    <?php include './php/header.php' ?>
    
    <main id='home'>
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
                . '<img src="./img/posters/'.$record['poster'].'" />'
                .'</a>';
        }
        ?>
    </main>

    <?php include './html/footer.html' ?>
</body>
</html>
