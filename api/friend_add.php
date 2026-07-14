<?php
    // 申請
    include_once "db.php";
    $send_user = $_GET['send_user'];
    $you_user = $_GET['you_user'];
    $status = $_GET['status'];
    $pdo->exec("INSERT INTO `friends` (`send_user`, `you_user`, `status`) VALUES ('$send_user', '$you_user', 'pending');");
    header("location:../friends.php");