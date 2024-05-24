<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    // 카테고리 값을 가져오기
    $category = isset($_GET['category']) ? $_GET['category'] : '';

    // 카테고리 값에 따라 제목과 소개 텍스트를 설정
    switch ($category) {
        case '레퍼런스':
            $title = '레퍼런스';
            $intro_text = '튜토리얼은 HTML, CSS, <em>JavaScript</em>, <em>React.js</em>, <em>Next.js</em> 등<br> 웹 개발의 기본부터 고급 기술까지 다룹니다.';
            break;
        case '튜토리얼':
            $title = '튜토리얼';
            $intro_text = '다양한 웹 개발 기술을 배울 수 있는 <em>튜토리얼</em>을 제공합니다.';
            break;
        default:
            $title = '웹쓰 블로그';
            $intro_text = '최신 웹 개발 관련 게시글을 확인하세요.';
            break;
    }
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>WEBSLOPER BLOG : 웹 개발자 블로그</title>

    <?php include "../include/head.php" ?>
    <!-- //head -->
</head>

<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" role="main">
        <div class="container">
            <div class="intro__inner blog line-bot">
                <div class="img"></div>
                <h2><?php echo $title ?></h2>
                <p><?php echo $intro_text ?></p>

                <?php if (isset($_SESSION['memberID'])) { ?>
                    <a href="blogCreate.php" class="write">글쓰기</a>
                <?php } ?>
            </div>
            <!-- //intro__inner -->

            <div class="blog__inner">
                <div class="left">
                    <div class="card__style column2">
<?php
    // $sql = "SELECT * FROM blogs WHERE blogDelete = 1 ORDER BY blogRegTime DESC LIMIT 10";
    // $result = $connect -> query($sql);

    // 카테고리 값에 따라 쿼리문 실행 
    if ($category) {
        // 해당 카테고리만 불러오기
        $sql = "SELECT * FROM blog WHERE blogDelete = 1 AND blogCate = ? ORDER BY blogRegTime DESC LIMIT 10";
        $stmt = $connect -> prepare($sql);
        $stmt -> bind_param("s", $category);
    } else {
        // 모든 카테고리 글 불러오기
        $sql = "SELECT * FROM blog WHERE blogDelete = 1 ORDER BY blogRegTime DESC LIMIT 10";
        $stmt = $connect -> prepare($sql);
    }

    $stmt -> execute();
    $result = $stmt -> get_result();

    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            $blogID = $row['blogID'];
            $blogTitle = $row['blogTitle'];
            $blogCont = $row['blogCont'];
            $blogCate = $row['blogCate'];
            $blogAuthor = $row['blogAuthor'];
            $blogRegTime = date('Y.m.d', $row['blogRegTime']);
            $blogImgFile = $row['blogImgFile'];
            $blogView = $row['blogView'];
            $blogLike = $row['blogLike'];
            $blogCont = mb_strimwidth(strip_tags($blogCont), 0, 180, "...", "UTF-8"); ?>

            <div class="card">
                <figure class="card__img">
                    <a href="blogView.php?blogID=<?php echo $blogID; ?>">
                        <img src="../assets/upload/<?php echo $blogImgFile; ?>" alt="<?php echo $blogTitle; ?>">
                    </a>
                </figure>
                <div class="card__info">
                    <div class="title">
                        <a href="blogView.php?blogID=<?php echo $blogID; ?>">
                            <h3><?php echo $blogTitle; ?></h3>
                            <p><?php echo $blogCont ?></p>
                        </a>
                    </div>
                    <div class="detail">
                        <div>
                            <a href="#" class="author"><?php echo $blogAuthor; ?></a>
                            <span class="date"><?php echo $blogRegTime; ?></span>
                        </div>
                        <div>
                            <span class="view"><span class="blind">조회수</span> <?php echo $blogView; ?></span>
                            <span class="like"><span class="blind">좋아요</span> <?php echo $blogLike; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        echo "<p class='center'>게시글이 없습니다.</p>";
    }
?>               
                    </div>
                    <!-- card__style -->

                    <div class="blog__pages">
                        <ul>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                        </ul>
                    </div>
                    <!-- blog__pages -->
                </div>
                <div class="right">
                    <?php include "blog-intro.php" ?>
                    <?php include "blog-cate.php" ?>
                    <?php include "blog-best.php" ?>
                    <?php include "blog-comment.php" ?>
                    <?php include "blog-notice.php" ?>
                </div>
            </div>
            <!-- //blog__inner -->
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>

</html>