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
            $username = $_GET['username'];
            $user_fetch = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
        ?>
        <div class="profile-header border m-5 p-4">
            <div class="profile-username">使用者名稱:<?=$user_fetch['username']?></div>
            <img src="./assets/img/profile/<?=$user_fetch['img']?>" width="150" height="150" class="profile-avatar">
            <div class="profile-bio">簡介:<?=$user_fetch['bio']?></div>
        </div>
        <div class="profile-content">
            <section class="articles">
                <?php
                    $articles = $pdo->query("SELECT * FROM `articles` WHERE `WP` = '$username'")->fetchAll();
                    if($articles < 1){
                        echo "目前尚未發布文章";
                    }else{
                    foreach($articles as $article){
                ?>
                <div class="article-item border m-4 p-4">
                    <div class="article-title">文章標題:<?=$article['title']?></div>
                    <time datetime="" class="article-date">發布日期:<?=$article['time']?></time>
                    <div class="article-excerpt"><?=mb_substr($article['content'],0,10)?></div>
                    <a href="./article.php?id=<?=$article['id']?>" class="article-readmore">閱讀更多</a>
                </div>
                <?php }} ?>
            </section>
        </div>
        <div class="profile-friend-actions">
            <?php
            $friend_fetch = $pdo->query("SELECT * FROM `friends` WHERE 
            ((`send_user` = '$username' AND `you_user` = '{$_SESSION['user']}') 
            OR
            (`send_user` = '{$_SESSION['user']}' AND `you_user` = '$username'))
            AND
            (`status` = 'friend' OR `status` = 'pending')")->fetch();
            // print_r($friend_fetch);
            if(!$friend_fetch){
            ?>
                <button class="btn btn-success m-4" onclick="location.href='./api/friend_add.php?send_user=<?=$_SESSION['user']?>&you_user=<?=$username?>'">申請好友</button>
            <?php } else { // 【修正】加上空白字元修復 Syntax Error ?>
                <button class="btn btn-danger m-4" onclick="location.href='./api/friend_del.php?send_user=<?=$_SESSION['user']?>&you_user=<?=$username?>&status=friend'">移除好友</button>
            <?php } ?>
            
        </div>
    </div>
</body>
</html>