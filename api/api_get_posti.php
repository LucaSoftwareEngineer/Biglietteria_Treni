<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $sql = " SELECT mat_posti FROM materiale_rotabile WHERE mat_id = " . $_GET["mat_id"];

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mat_posti = $row["mat_posti"];
            echo $mat_posti;
        }
    } else {
        echo "0";
    }
?>

<?php include '../config/db_close.php' ?>