<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php 

    $sql = " ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row[""];
            echo "OK";
        }
    } else {
        echo "KO";
    }
?>

<?php include '../config/db_close.php' ?>