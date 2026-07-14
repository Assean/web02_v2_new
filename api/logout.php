<?php
    include_once "db.php";
    unset($_SESSION['key_result']);
    unset($_SESSION['user']);
    header("location:../login.php");