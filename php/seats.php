<h3>Wybierz miejsce:</h3>

<?php include './php/middleware/form-action.php' ?>

<form role='form' method='POST' action='<?= htmlspecialchars($href) ?>' >
    <?php
    $sql = "SELECT `seat` FROM `seats` WHERE "
        ."`title` LIKE '".addslashes($_GET['show'])."' AND "
        ."`show_dt` LIKE '".addslashes($_GET['show_dt'])."'";

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
    <input type='hidden' name='show_dt' value="<?= $_GET['show_dt'] ?>" />
    <input type='hidden' name='buy' value="<?= TRUE ?>" />
    <input type='reset' value='Wyczyść' />
    <input type='submit' value='Kup bilet' />
</form>
