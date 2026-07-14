<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="profile-page">
        <?php 
            include_once "inc/header.php";
            // 尚未實作頭像、簡介
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['bio'])) {
                    $bio = $_POST['bio'];
                    $pdo->exec("UPDATE `users` SET `bio` = '$bio' WHERE `username` = '{$_SESSION['user']}'");
                    echo "<script>location='profile.php'</script>";
                    exit;
                } else {
                    echo "<script>alert('簡介更新失敗')</script>";
                }
            }
        ?>
        <section class="profile-header border p-3 m-5">
            <form enctype="multipart/form-data" method="post" class="m-3">
                <img src="./assets/img/profile/<?=$user['img']?>" class="profile-avatar" width="100" height="120">
            </form>
            <div class="profile-bio">
                <form enctype="multipart/form-data" method="post">
                    <textarea name="header profile-bio" id="bio" readonly></textarea>
                </form>
            </div>
        </section>
        <a href="./add_article.php" class="new-post-link btn btn-info ml-5">發布文章</a>
        <section class="profile-article m-5">
            <?php
                $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '{$_SESSION['user']}'")->fetchAll();
                foreach($articles as $article){
            ?>
            <div class="article-item border m-3 p-3">
                <div class="article-title">文章標題:<?=$article['title']?></div>
                <time datetime="" class="article-date">發布日期:<?=$article['time']?></time>
                <a href="./article.php?id=<?=$article['id']?>" class="article-readmore d-flex justify-content-end">閱讀更多</a>
            </div>
            <?php } ?>
        </section>
    </div>
    <script>
        const $bio = $('#bio');
        $bio.on('click', () => $bio.prop('readonly', false));
        $bio.on('keydown', e => {
        if (e.key === 'Enter') e.preventDefault();
        e.key === 'Enter' ? $bio.closest('form').submit() : null;
        });
    </script>
</body>
</html>