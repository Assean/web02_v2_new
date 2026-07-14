<?php
    include_once "db.php";
    $id = $_GET['id'];
    $pdo->exec("DELETE FROM `form_result` WHERE `form_result`.`id` = $id");
    header("location:../admin_result.php");