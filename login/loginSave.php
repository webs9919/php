<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youID = $connect -> real_escape_string(trim($_POST['youID']));
        $youPass = $connect -> real_escape_string(trim($_POST['youPass']));

        // 유효성 검사
        if (empty($youID) || empty($youPass)) {
            echo "<script>alert('아이디와 비밀번호를 입력해주세요.'); history.back();</script>";
            exit;
        }

        // 쿼리 작성 및 실행
        $stmt = $connect -> prepare("SELECT memberID, youID, youName, youEmail, youPass, youImgSrc FROM members WHERE youID = ?");
        $stmt -> bind_param("s", $youID);
        $stmt -> execute();
        $result = $stmt -> get_result();

        if ($result -> num_rows > 0) {
            $info = $result -> fetch_assoc();

            // 비밀번호 확인
            if (password_verify($youPass, $info['youPass'])) {
                // 세션 설정
                $_SESSION['memberID'] = $info['memberID'];
                $_SESSION['youID'] = $info['youID'];
                $_SESSION['youName'] = $info['youName'];
                $_SESSION['youEmail'] = $info['youEmail'];
                $_SESSION['youImgSrc'] = $info['youImgSrc'];

                echo "<script>alert('로그인 성공!'); location.href='../main/main.php';</script>";
            } else {
                echo "<script>alert('비밀번호가 틀렸습니다.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('존재하지 않는 아이디입니다.'); history.back();</script>";
        }

        $stmt -> close();
        $connect -> close();
    } else {
        echo "<script>alert('잘못된 접근입니다. 관리자에게 문의하세요!'); history.back();</script>";
    }
?>