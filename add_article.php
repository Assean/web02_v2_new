<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <?php include_once "inc/header.php";if(!isset($_SESSION['user']))exit(header("location:login.php")); ?>
    <form action="./api/add_article.php" class="article-create-form m-5" method="post">
        <label for="article-title">文章標題:</label>
        <input type="text" class="article-title-input w-25 form-control" name="title">
        <br>
        <label for="article-content">文章內容:</label>
        <textarea name="content" id="" class="article-content-input w-25 form-control"></textarea>
        <button class="article-submit-button w-25 btn btn-info mt-3">發布文章</button>
    </form>
</body>
</html>