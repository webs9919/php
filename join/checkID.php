<?php
    include "../connect/connect.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youID = $connect -> real_escape_string(trim($_POST['youID']));

        $sql = "SELECT youID FROM members WHERE youID = '$youID'";
        $result = $connect -> query($sql);

        if ($result -> num_rows > 0) {
            echo json_encode(array("status" => "error", "message" => "➟ 이미 사용 중인 아이디입니다."));
        } else {
            echo json_encode(array("status" => "success", "message" => "➟ 사용 가능한 아이디입니다."));
        }

        $connect -> close();
    }
?>