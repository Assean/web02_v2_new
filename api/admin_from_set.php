<?php
    include_once "db.php";
    $status = $_POST['status'];
    $time_start = $_POST['time_start'];
    $time_stop = $_POST['time_stop'];
    $pdo->exec("UPDATE `admin_from` SET `status` = '$status', `time_start` = '$time_start', `time_stop` = '$time_stop' WHERE `admin_from`.`id` = 1");
    header("location:../admin.php");