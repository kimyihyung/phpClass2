<?php
    $host = "localhost";
    $user = "k5249";
    $pw = "kimklh1009!%";
    $db = "k5249";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf8");
    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        //echo "database connect true";
    }
?>