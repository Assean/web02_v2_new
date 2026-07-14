<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="home">
        <?php include_once "inc/header.php"; ?>
        <section class="articles m-5">
            <?php
                $articles = $pdo->query("SELECT * FROM `articles`")->fetchAll();
                foreach($articles as $article){
            ?>
            <article class="article-item m-3 p-1 border">
                <div class="article-title p-1">文章標題:<?=$article['title']?></div>
                <time datetime="" class="article-date p-1">發布日期:<?=$article['time']?></time>
                <div class="article-excerpt p-1">文章摘要:<?=mb_substr($article['content'],0,10)?></div>
                <a href="./article.php?id=<?=$article['id']?>" class="article-readmore p-1 d-flex justify-content-end">閱讀更多</a>
            </article>
            <?php } ?>
        </section>
        <aside class="notifications m-5">
            <?php for ($i=0; $i < 5; $i++) { ?>
            <div class="notification-item m-3 border p-3">
                <div class="notification-title p-1">通知標題:test</div>
                <time datetime="" class="notification-date p-1">發布日期:2026/07/09</time>
            </div>
            <?php } ?>
        </aside>
    </div>
</body>
</html>