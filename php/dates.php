<h3>Wybierz dzień:</h3>

<?php
$sql = "SELECT `show_dt` FROM `dates` WHERE `title` LIKE '".addslashes($_GET['show'])."'";
$query = mysqli_query($conn, $sql);

$arr = array();

foreach ($query as $row => $record) {
    $arr[substr($record['show_dt'], 0, 10)] = array();
}

foreach ($query as $row => $record) {
    array_push(
        $arr[substr($record['show_dt'], 0, 10)],
        substr($record['show_dt'], 11)
    );
}

foreach ($arr as $date => $hours) {
    echo '<div id="'.$date.'"><h4>'.$date.'</h4><br>';
    foreach ($hours as $i => $hour) {
        echo '<button class="hours">'.$hour.'</button>';
    }
    echo '</div>';
}
?>
