<?php
    include_once "db.php";
    header("Content-Type: application/json;charset=UTF-8");
    $id = $_GET['id'];
    if($id == ''){
        echo json_encode([
            "success" => true,
            "data" => "request query params not found"
            ]); 
        exit;
    }
        $article = $pdo->query("SELECT * FROM `articles` WHERE `id` = '$id'")->fetch(PDO::FETCH_ASSOC);
        if(!$article){
            echo json_encode([
                "success" => true,
                "data" => "user not found"
                ]); 
            exit;
        }
        $list=[];
            $list[]=[
                "title" => $article['title'],
                "date" => $article['time'],
                "body" => mb_substr($article['content'],0,100,"UTF-8")
            ];

        echo json_encode([
            "success" => true,
            "data" => $list
        ]);