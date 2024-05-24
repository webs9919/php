<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE members (";
    $sql .= "memberID INT(10) UNSIGNED AUTO_INCREMENT,";
    $sql .= "youID VARCHAR(40) NOT NULL UNIQUE,";
    $sql .= "youName VARCHAR(40) NOT NULL,";
    $sql .= "youEmail VARCHAR(40) NOT NULL,";
    $sql .= "youPass VARCHAR(255) NOT NULL,";
    $sql .= "youAddress VARCHAR(255) NOT NULL,";
    $sql .= "youPhone VARCHAR(40) NOT NULL,";
    $sql .= "youImgSrc VARCHAR(100) DEFAULT 'Angry',";
    $sql .= "youImgSize VARCHAR(40) DEFAULT '0',";
    $sql .= "youDelete TINYINT(1) DEFAULT 1,";
    $sql .= "youRegTime INT(11) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") DEFAULT CHARSET=utf8;";

    if ($connect -> query($sql) === TRUE) {
        echo "Table 'members' created successfully.";
    } else {
        echo "Error creating table: " . $connect->error;
    }

    $connect -> close();
?>