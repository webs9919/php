<header id="header" role="banner">
    <div class="container">
        <div class="header__inner">
            <div class="star">
                <a href="#"><span class="blind">다크 모드</span></a>
            </div>
            <div class="logo">
                <h1><a href="../main/main.php">websloper blog</a></h1>
            </div>
            <div class="member">
                <ul>
                    <?php if (isset($_SESSION['youName'])) { ?>
                        <li class="on"><a href="#"><img src="<?=$_SESSION['youImgSrc']?>" alt="<?=$_SESSION['youName']?>"></a></li>
                    <?php } else { ?>
                        <li class="off"><a href="../login/login.php">로그인</a></li>
                    <?php } ?>
                </ul>
                <div class="profile">
                    <div class="title">
                        <div class="id"><?=$_SESSION['youID']?>(<?=$_SESSION['youName']?>)</div>
                        <div class="email"><?=$_SESSION['youEmail']?></div>
                        <a href="../login/logout.php" class="logout"><span class="blind">로그아웃</span></a>
                    </div>
                    <ul>
                        <li><a href="#">프로필</a></li>
                        <li><a href="#">즐겨찾기</a></li>
                        <li><a href="#">댓글</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <nav class="nav__inner">
            <ul>
                <li><a href="../blog/blogRead.php?category=레퍼런스">레퍼런스</a></li>
                <li><a href="../blog/blogRead.php?category=튜토리얼">튜토리얼</a></li>
                <li><a href="../comment/commentRead.php">방명록</a></li>
                <li><a href="../board/boardRead.php">공지사항</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- //header -->