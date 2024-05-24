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
<?php
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
?>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>

</html>