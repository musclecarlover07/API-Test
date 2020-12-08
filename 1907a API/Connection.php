<?php
    $servername = "futureoftesting.us";
    $username = "fotus_senswebuser";
    $password = "$3cur3Password";
    $database = "fotus_sensweb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>