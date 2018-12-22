<?php
    $con = mysqli_connect("localhost","root","","db",3306);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>