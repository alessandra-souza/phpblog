<?php

    // Creating Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    // Checking the connection
    if(mysqli_connect_errno()) {
        // Connection Failed
        echo 'Failed to connect to MySql '.mysqli_connect_errno();
    }

?>
