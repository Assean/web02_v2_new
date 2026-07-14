<?php
    include_once "db.php";
    $username = $_POST['username'];
    // $email = $_POST['email'];
    $password = $_POST['password'];
    // $password_confirm = $_POST['password-confirm'];
    $acc_check = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    $pass_check = $pdo->query("SELECT * FROM `users` WHERE `password` = '$password'")->fetch();
    if($acc_check > 1){
        if($pass_check > 1){
            $_SESSION['user'] = $username;
            header("location:../profile.php");
        }else{
            echo "<script>alert('帳號密碼錯誤');location='../register.php'</script>";
        }
    }else{
            echo "<script>alert('帳號密碼錯誤');location='../register.php'</script>";
        }