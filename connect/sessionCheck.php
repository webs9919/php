<?php
    if(!isset($_SESSION['memberID'])){
        echo "<script>alert('로그인이 필요합니다.');</script>";
        echo '<script>window.location.href = "../login/login.php";</script>';
    }
?>