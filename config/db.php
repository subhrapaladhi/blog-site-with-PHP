<?php
    // create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_POST, DB_NAME);

    // check connection
    if(mysqli_connect_errno()){
        // connection failed
        echo 'failed to connect to mysql '. mysqli_connect_errno();
    }