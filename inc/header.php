<?php
    include_once "api/db.php";
?>
<link rel="stylesheet" href="assets/css/bootstrap.css">
<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.js"></script>
<div class="site-header">
    <div class="brand">
        <a href="./index.php" class="brand-link">
            <img src="./assets/img/logo/logo.png" width="50" height="50">
        </a>
    </div>
    <nav class="main-nav d-flex justify-content-center">
        <a href="./index.php" class="home-link btn btn-info m-1">首頁</a>
        <a href="./games.php" class="games-link btn btn-info m-1">遊戲</a>
        <a href="./friends.php" class="friends-link btn btn-info m-1">好友</a>
    </nav>
    <div class="user-area d-flex justify-content-end">
        <?php if(!isset($_SESSION['user'])){?>
        <a href="./login.php" class="login-link btn btn-info m-1">登入</a>
        <a href="./register.php" class="register-link btn btn-info m-1">註冊</a>
        <?php }else{ ?>
        <div class="user-badge m-2">
            <?= $_SESSION['user'] ?? ''?>
        </div>
        <a href="./admin.php" class="profile-link btn btn-info m-1">意見調查/問卷管理</a>
        <a href="./profile.php" class="profile-link btn btn-info m-1">個人頁面入口</a>
        <a href="./api/logout.php" class="logout-link btn btn-info m-1">登出</a>
        <?php } ?>
    </div>
</div>