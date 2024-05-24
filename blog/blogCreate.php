<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
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
                <h2>블로그 글쓰기</h2>
            </div>
            <!-- //intro__inner -->

            <div class="blog__inner">
                <div class="left">
                    <div class="blog__create">
                        <form action="blogCreateSave.php" name="blogCreateSave" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="blind">게시글 작성하기</legend>
                                <div>
                                    <label for="blogCate" class="blind">카테고리</label>
                                    <select name="blogCate" id="blogCate">
                                        <option value="레퍼런스">레퍼런스</option>
                                        <option value="튜토리얼">튜토리얼</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="blogTitle" class="blind">제목</label>
                                    <input type="text" id="blogTitle" name="blogTitle" placeholder="제목을 적어주세요!"
                                        class="input-style" required>
                                </div>
                                <div>
                                    <label for="blogCont" class="blind">내용</label>
                                    <textarea id="blogCont" name="blogCont" placeholder="내용을 적어주세요!"></textarea>
                                </div>
                                <div class="file">
                                    <label for="blogFile" class="blind">파일</label>
                                    <input type="file" id="blogFile" name="blogFile">
                                    <p>* jpg, gif, png, webp 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.</p>
                                </div>
                                <div class="btn">
                                    <button type="submit" class="btn-style">저장하기</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!-- //blog__create -->
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

    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/translations/ko.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#blogCont'), {
                language: 'ko'
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>