<?php
    include_once "db.php";
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pdo->exec("INSERT INTO `articles` (`title`, `content`, `time`, `WP`) VALUES ('$title', '$content', '2026-07-10', '{$_SESSION["user"]}')");
    // $pdo->exec("INSERT INTO `articles` (`title`, `content`, `time`, `WP`) VALUES ('$title', '$content', '2026-07-10', '{$_SESSION['user']}')");
    $fetch = $pdo->query("SELECT * FROM `articles` WHERE `id` ORDER BY `id` DESC")->fetch()[0];
    echo "<script>alert('發表成功');location='../article.php?id=$fetch'</script>";