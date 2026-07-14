<?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=web02_v2_new";
    $pdo=new PDO($dsn,'admin','1234');
    date_default_timezone_set("Asia/Taipei");
    session_start();
?>