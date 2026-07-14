<?php
    include "db.php";
    date_default_timezone_set('Asia/Taipei');

    // 1. 抓取資料庫設定與當前時間
    $s = $pdo->query("SELECT * FROM `admin_from` WHERE `id` = 1")->fetch();
    $now = time();

    // 2. 建立彈出視窗與轉址的函式
    function msg($text, $js = "history.back();") {
        die("<script>alert('$text'); $js</script>");
    }

    // 3. 判斷表單狀態與時間
    if ($s['status'] != 'true' && $s['status'] != 1) {
        msg('表單目前不接受回應');
    }

    if ($now < strtotime($s['time_start']) OR $now > strtotime($s['time_stop'])) {
        msg('目前不在回應時間範圍內');
    }

    // 4. 直接接收 POST 變數 (無防呆)
    $name = $_POST['name'];
    $email = $_POST['email'];
    $game = $_POST['game'];
    $good_or_nono = $_POST['good_or_nono'];
    $good_text = $_POST['good_text'];

    // 5. 直接將變數寫入 SQL (無防 SQL 注入)
    $pdo->exec("INSERT INTO `form_result` (`name`, `email`, `game`, `good_or_nono`, `good_text`) 
                VALUES ('$name', '$email', '$game', '$good_or_nono', '$good_text')");

    // 6. 成功送出
    msg('已送出回應', "location.href='../form';");
?>