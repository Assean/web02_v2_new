<?php
    include_once "db.php";
    $key = $_POST['search_key'];
    $result = $pdo->query("SELECT * FROM `users` WHERE `username` LIKE '%$key%'")->fetchAll();
    print_r($result);
    $_SESSION['key_result'] = $result;
    header("location:../friends.php");