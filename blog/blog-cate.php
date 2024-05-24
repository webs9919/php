<?php
    // 전체 게시글 수 조회
    $sql = "SELECT COUNT(*) as cnt FROM blog WHERE blogDelete = 1";
    $result = $connect -> query($sql);
    $totalBlogs = $result -> fetch_assoc()['cnt'];

    // 카테고리별 게시글 수 조회
    $sql = "SELECT blogCate, COUNT(*) as cnt FROM blog WHERE blogDelete = 1 GROUP BY blogCate";
    $result = $connect -> query($sql);
    $categories = [];

    if ($result -> num_rows > 0) {
        while ($row = $result -> fetch_assoc()) {
            $categories[$row['blogCate']] = $row['cnt'];
        }
    }
?>

<article class="blog__cate">
    <h3>카테고리</h3>
    <ul>
        <li><a href="blogRead.php">전체글 <span class="num"><?php echo $totalBlogs; ?></span></a></li>
        <li><a href="blogRead.php?category=레퍼런스">레퍼런스 <span class="num"><?php echo isset($categories['레퍼런스']) ? $categories['레퍼런스'] : 0; ?></span></a></li>
        <li><a href="blogRead.php?category=튜토리얼">튜토리얼 <span class="num"><?php echo isset($categories['튜토리얼']) ? $categories['튜토리얼'] : 0; ?></span></a></li>
        <li><a href="../comment/commentRead.php">방명록</a></li>
        <li><a href="../board/boardRead.php">공지사항</a></li>
    </ul>
</article>
<!-- //blog__cate -->