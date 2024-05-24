<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>WEBSLOPER BLOG : 로그인</title>

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
            <div class="member__inner">
                <div class="member__title">
                    <h2>로그인</h2>
                    <p>
                        로그인을 하시면 게시글 및 댓글 작성이 가능합니다. 🥹<br />
                        회원가입을 하셔야 로그인이 가능합니다.
                    </p>
                </div>
                <!-- //member__title -->

                <div class="member__form line-top line-bot">
                    <form action="loginSave.php" name="loginSave" method="post">
                        <fieldset>
                            <legend class="blind">로그인 영역</legend>
                            <div>
                                <label for="youID" class="blind">이메일</label>
                                <input type="text" name="youID" id="youID" placeholder="아이디" autocomplete="off"
                                    class="input-style" required>
                            </div>
                            <div>
                                <label for="youPass" class="blind">패스워드</label>
                                <input type="password" name="youPass" id="youPass" placeholder="패스워드" autocomplete="off"
                                    class="input-style" required>
                            </div>
                            <div>
                                <button type="submit">로그인</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!-- //member__form -->

                <div class="member__add">
                    <ul>
                        <li>회원가입을 하지 않았다면 회원가입을 먼저 해주세요! <a href="../join/join1.php" class="line-under">회원가입</a></li>
                        <li>아이디가 기억이 나지 않는다면! <a href="#" class="line-under">아이디 찾기</a></li>
                        <li>비밀번호가 기억이 나지 않는다면! <a href="#" class="line-under">비밀번호 찾기</a></li>
                    </ul>
                </div>
                <!-- //member__add -->
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>

</html>