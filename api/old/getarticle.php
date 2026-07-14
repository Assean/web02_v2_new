<?php
    include_once "db.php";
    header('Content-Type: application/json;charset=utf-8');
    $id = $_GET['id'];
    if($id === ''){
        echo json_encode([
        "success"=> false, 
        "data" => "request query params not found"
    ]);
    exit;
    }
    $result = $pdo->query("SELECT * FROM `articles` WHERE `id` = {$id}");
    $article = $result->fetch(PDO::FETCH_ASSOC);

    if(!$article){
        echo json_encode([
        "success"=> false, 
        "data" => "user not found"
    ]);
    exit;
    }
    $datelist = [];
    // foreach ($article as $row) {
        $datelist [] =[
            "title" => $article['title'], 
            "createdate"=> $article['time'], 
            "body" => $article['content']
        ];
    // }
        echo json_encode([
        "success"=> true, 
        "data" => $datelist
    ]);
    