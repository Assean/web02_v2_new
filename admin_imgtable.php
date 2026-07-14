<?php 
include_once "inc/header.php"; 
$goodrow = $pdo->query("SELECT COUNT(id) AS num FROM form_result WHERE good_or_nono = '好'")->fetch();
$good = $goodrow['num'];
$nonorow = $pdo->query("SELECT COUNT(id) AS num FROM form_result WHERE good_or_nono = '不好'")->fetch();
$nono = $nonorow['num'];
$total = $good + $nono;
$good_P = ($good / $total) * 100;
$nono_P = ($nono / $total) * 100;
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech - 統計資料</title>
</head>
<body>
    <div class="container my-4 text-center">
        
        <div class="mb-4">
            <a href="admin.php" class="btn btn-info text-white m-1">基本設定</a>
            <a href="admin_result.php" class="btn btn-info text-white m-1">問卷回應</a>
            <a href="admin_imgtable.php" class="btn btn-info text-white m-1">統計資料</a>
            <a href="./form/" class="btn btn-outline-info m-1">前往表單頁面</a>
        </div>
        
        <h2 class="mb-3 fw-bold">後台管理 - 統計資料</h2>
        <div class="row h-100">
            <div class="good w-25 col-4">
                <div>資料筆數:<?=$good?></div>
                <div style="height: <?=$good_P?>%;" class="bg-info"></div>
                <div>好</div>
            </div>
    
            <div  class="nono w-25 col-4">
                <div>資料筆數:<?=$nono?></div>
                <div style="height: <?=$nono_P?>%;" class="bg-info"></div>
                <div>不好</div>
            </div>
        </div>
    </div>
</body>
</html>