<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>
<body>
    <div id="article">
        <?php 
            include_once "inc/header.php";
            $id = $_GET['id'];
            $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch();
        ?>
        <div class="article-header m-5">
            <h1 class="article-title d-flex justify-content-center">文章標題:<?=$article['title']?></h1>
            <time datetime="" class="article-date d-flex justify-content-end">文章發布日期:<?=$article['time']?></time>
            <div class="article-body d-flex justify-content-center mt-4 border p-3">
                <?=$article['content']?>
            </div>
        </div>
    </div>
</body>
</html>