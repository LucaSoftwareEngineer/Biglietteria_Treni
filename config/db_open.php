<?php
    //localhost
    $db ="db";
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";

    $conn= mysqli_connect($db_host,$db_user,$db_password);
    if (!$conn) 
    {
        print "si è verificato un problema tecnico";
        exit;
    }
    mysqli_select_db($conn,$db);
?>
