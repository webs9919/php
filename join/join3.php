<?php
    include "../connect/connect.php"; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // 폼 데이터 가져오기
        $youID = $connect -> real_escape_string(trim($_POST['youID']));
        $youName = $connect -> real_escape_string(trim($_POST['youName']));
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $youPass = $connect -> real_escape_string(trim($_POST['youPass']));
        $youAddress1 = $connect -> real_escape_string(trim($_POST['youAddress1']));
        $youAddress2 = $connect -> real_escape_string(trim($_POST['youAddress2']));
        $youAddress3 = $connect -> real_escape_string(trim($_POST['youAddress3']));
        $youPhone = $connect -> real_escape_string(trim($_POST['youPhone']));
        $youRegTime = time();

        // 이미지 이름
        $imageName = ['Angry', 'Awe', 'Black', 'Calm', 'Concerned', 'ConcernedFear', 'Contempt', 'Cute', 'Cyclops', 'Driven', 'EatingHappy', 'Explaining', 'EyesClosed', 'Fear', 'Hectic', 'LovingGrin1', 'LovingGrin2', 'Monster', 'Old', 'Rage', 'Serious', 'Smile', 'SmileBig', 'SmileLOL', 'SmileTeethGap', 'Solemn', 'Suspicious', 'Tired', 'VeryAngry'];
        $randomImageKey = array_rand($imageName);
        $youImgSrc = "../assets/face/" . $imageName[$randomImageKey] . ".svg";

        // 비밀번호 해싱
        $hashedPass = password_hash($youPass, PASSWORD_DEFAULT);

        // 주소 합치기
        $youAddress = $youAddress1 . " " . $youAddress2 . " " . $youAddress3;

        // 쿼리 실행 (Prepared Statement 사용)
        $stmt = $connect -> prepare("INSERT INTO members (youID, youName, youEmail, youPass, youPhone, youAddress, youRegTime, youImgSrc, youDelete) VALUES(?, ?, ?, ?, ?, ?, ?, ?, '1')");
        $stmt -> bind_param("ssssssss", $youID, $youName, $youEmail, $hashedPass, $youPhone, $youAddress, $youRegTime, $youImgSrc);
        $result = $stmt -> execute();

        // 결과 확인
        if (!$result) {
            echo "<script>alert('쿼리 실행에 실패했습니다: " . $connect->error . "'); history.back();</script>";
        }   

        // 데이터베이스 연결 닫기
        $stmt -> close();
        $connect -> close();
    }
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>WEBSLOPER BLOG : 회원가입</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->
</head>

<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main" class="mb100">
        <div class="container">
            <div class="intro__inner join line-bot">
                <div class="img"></div>
                <h2>회원가입</h2>
                <p>
                    회원가입이 완료되었습니다. 🤓<br>
                    이제부터는 <em>블러그</em>에서 제공되는 <em>모든 서비스</em>를 이용할 수 있습니다.
                </p>
            </div>
            <!-- //intro__inner -->


            <div class="member__inner">
                <div class="member__sub">
                    <h2>가입완료</h2>
                    <ul>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                    </ul>
                </div>
                <div class="member__end">
                    <span class="pumping" data-text="축하합니다."><i>클릭하면 로그인 페이지로 이동합니다.</i></span>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script type="module" src="../assets/js/pumping.js"></script>
</body>

</html>