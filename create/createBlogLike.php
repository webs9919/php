<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE blogLike (";
    $sql .= "likeID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    $sql .= "blogID INT(10) UNSIGNED NOT NULL,";
    $sql .= "memberID INT(10) UNSIGNED NOT NULL,";
    $sql .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,";
    $sql .= "FOREIGN KEY (blogID) REFERENCES blog(blogID) ON DELETE CASCADE,";
    $sql .= "FOREIGN KEY (memberID) REFERENCES member(memberID) ON DELETE CASCADE";
    $sql .= ")";

    if ($connect -> query($sql) === TRUE) {
        echo "Table 'blogLike' created successfully.";
    } else {
        echo "Error creating table: " . $connect -> error;
    }

    $connect -> close();
?>