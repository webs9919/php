<?php
    include "../connect/connect.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));

        $sql = "SELECT youEmail FROM members WHERE youEmail = '$youEmail'";
        $result = $connect -> query($sql);

        if ($result -> num_rows > 0) {
            echo json_encode(array("status" => "error", "message" => "➟ 이미 사용 중인 이메일입니다."));
        } else {
            echo json_encode(array("status" => "success", "message" => "➟ 사용 가능한 이메일입니다."));
        }

        $connect -> close();
    }
?>