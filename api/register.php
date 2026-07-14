<?php
    include_once "db.php";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password-confirm'];
    $acc_check = $pdo->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch();
    if($password == $password_confirm){
        if($acc_check > 1){
        echo "<script>alert('帳號已存在');location='../register.php'</script>";
        // header("location:../register.php");
    }else{
        $pdo->exec("INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
        header("location:../login.php");
        exit;
    }
    }else{
        echo "<script>alert('密碼不一致');location='../register.php'</script>";
        // header("location:../register.php");
    }
    if($acc_check > 1){
        echo "<script>alert('帳號已存在');location='../register.php'</script>";
        // header("location:../register.php");
    }else{
        $pdo->exec("INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
        header("location:../login.php");
    }