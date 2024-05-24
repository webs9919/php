<?php 
    $host = "localhost";
    $user = "webstoryboy";
    $pw = "Forever0!";
    $db = "webstoryboy";

    $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf8");
    $connect -> set_charset("utf8mb4");

    if($connect -> connect_error){
        echo "Connect Failed" . $connect -> connect_error;
    }
?>