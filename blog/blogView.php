<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
                <h2>레퍼런스</h2>
                <p>웹과 관련된 글입니다.</p>

                <?php if (isset($_SESSION['memberID'])) { ?>
                    <a href="blogCreate.php" class="write">글쓰기</a>
                <?php } ?>
            </div>
            <!-- //intro__inner -->

            <div class="blog__inner">
                <div class="left">
                    <section class="blog__view">

                    </section>
                    <!-- //blog__view -->

                    <article class="blog__next">

                    </article>
                    <!-- //blog__next -->

                    <article class="blog__related">

                    </article>
                    <!-- //blog__related -->

                    <section class="blog__comments">

                    </article>
                    <!-- //blog__comments -->
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