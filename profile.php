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
            // 讀取使用者資料
            $user = $pdo->query("SELECT * FROM `users` WHERE `username` = '{$_SESSION['user']}'")->fetch();
            
            // 表單提交處理
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                // 狀況 A：處理頭像上傳
                if(isset($_FILES['header']['tmp_name']) && $_FILES['header']['tmp_name']){
                    $ext = ['image/jpeg'=>'jpg','image/png'=>'png','image/gif'=>'gif']
                    [(new finfo(FILEINFO_MIME_TYPE))->file($_FILES['header']['tmp_name'])];
                    
                    // 【修正】補上副檔名前的「小數點」
                    $filename = $user['username'] . '_1.' . $ext; 
                    
                    $ok = move_uploaded_file($_FILES['header']['tmp_name'], "./assets/img/profile/$filename");
                    if($ok){
                        $pdo->exec("UPDATE `users` SET `img` = '$filename' WHERE `username`= '{$_SESSION['user']}'");
                        echo "<script>location='profile.php'</script>";
                        exit();
                    } else {
                        echo "<script>alert('頭像上傳處理失敗');</script>";
                    }
                }
                
                // 狀況 B：處理簡介更新 (使用 elseif 避免與頭像上傳邏輯衝突)
                elseif (isset($_POST['bio'])) {
                    $bio = $_POST['bio'];
                    $pdo->exec("UPDATE `users` SET `bio` = '$bio' WHERE `username` = '{$_SESSION['user']}'");
                    echo "<script>location='profile.php'</script>";
                    exit;
                }
            }
        ?>
        <section class="profile-header border p-3 m-5">
            <form enctype="multipart/form-data" method="post" class="m-3">
                <!-- 【修正】label for 對應正確的 input id (header) -->
                <label for="header">
                    <img src="./assets/img/profile/<?=$user['img']?>" class="profile-avatar" width="100" height="120">
                    <!-- 【修正】將 name 改為 header，並加入 onchange 自動提交表單 -->
                    <input type="file" name="header" id="header" class="d-none" onchange="this.form.submit()">
                </label>
            </form>
            <div class="profile-bio">
                <form enctype="multipart/form-data" method="post">
                    <textarea name="bio" id="bio" class="profile-bio-input form-control" readonly><?=$user['bio']?></textarea>
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
        $bio.on('click',()=>$bio.prop('readonly',false));
        $bio.on('keydown',e=>{
            if(e.key === 'POST') e.preventDefault();
            e.key === 'Enter' ? $bio.closest('form').submit() : null;
        })
    </script>
</body>
</html>