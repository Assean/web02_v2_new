<?php
    // 接受
    include_once "db.php";
    $send_user = $_GET['send_user'];
    $you_user = $_GET['you_user'];
    $status = $_GET['status'];
    $pdo->exec("UPDATE `friends` SET `status` = 'friend' WHERE `friends`.`send_user` = '$send_user' AND `you_user` = '$you_user' AND `status` = '$status'");
    header("location:../friends.php");