<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 데이터 가져오기
        $blogCate = $connect->real_escape_string($_POST['blogCate']);
        $blogTitle = $connect->real_escape_string($_POST['blogTitle']);
        $blogCont = $connect->real_escape_string($_POST['blogCont']);
        $memberID = $_SESSION['memberID'];
        $blogAuthor = $_SESSION['youName'];

        // 파일 데이터 가져오기
        $blogFile = $_FILES['blogFile'];
        $blogFileName = $blogFile['name'];
        $blogFileTmp = $blogFile['tmp_name'];
        $blogFileSize = $blogFile['size'];
        $blogFileError = $blogFile['error'];

        // 파일 정보
        $allowedExt = array('jpg', 'jpeg', 'png', 'gif', 'webp');
        $uploadDir = "../assets/upload/";
        $blogImgFile = "default.jpg";
        $blogImgSize = 0;

        // 파일 업로드 (에러X AND 용량이 있을 때)
        if ($blogFileError === 0 && $blogFileSize > 0) {
            // 파일 확장자 확인
            $fileExt = strtolower(pathinfo($blogFileName, PATHINFO_EXTENSION));

            if (in_array($fileExt, $allowedExt)) {
                if ($blogFileSize < 1048576) {
                    $newFileName = "img_" . uniqid('', true) . "." . $fileExt;
                    $fileDestination = $uploadDir . $newFileName;

                    if (move_uploaded_file($blogFileTmp, $fileDestination)) {
                        $blogImgFile = $newFileName;
                        $blogImgSize = $blogFileSize;
                    } else {
                        echo "<script>alert('파일 업로드에 실패했습니다.'); history.back();</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('파일 용량이 너무 큽니다. 1MB 이하로 해주세요.'); history.back();</script>";
                    exit;
                }
            } else {
                echo "<script>alert('허용된 확장자 파일이 아닙니다.'); history.back();</script>";
                exit;
            }
        }

        $blogRegTime = time();

        // 데이터베이스에 데이터 삽입
        $stmt = $connect -> prepare("INSERT INTO blog (memberID, blogTitle, blogCont, blogCate, blogAuthor, blogRegTime, blogView, blogLike, blogImgFile, blogImgSize) 
                                   VALUES (?, ?, ?, ?, ?, ?, 0, 0, ?, ?)");
        $stmt -> bind_param("issssssi", $memberID, $blogTitle, $blogCont, $blogCate, $blogAuthor, $blogRegTime, $blogImgFile, $blogImgSize);

        if ($stmt -> execute()) {
            echo "<script>alert('게시글이 성공적으로 작성되었습니다.'); location.href='blogRead.php';</script>";
        } else {
            echo "<script>alert('게시글 작성에 실패했습니다. 다시 시도해 주세요.'); history.back();</script>";
        }

        $stmt -> close();
        $connect -> close();

    } else {
        // POST 방식이 아닌 경우
        echo "<script>alert('잘못된 접근방식입니다. 관리자에게 문의하세요'); history.back();</script>";
    }
?>
