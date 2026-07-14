<?php
    include_once "db.php";
    header("Content-Type: application/json;charset=UTF-8");
    $articles = $pdo->query("SELECT * FROM `articles`")->fetchAll(PDO::FETCH_ASSOC);
    $list=[];
    foreach($articles as $article){
        $list[]=[
            "title" => $article['title'],
            "date" => $article['time'],
            "body" => mb_substr($article['content'],0,100,"UTF-8")
        ];
    }
    echo json_encode([
        "success" => true,
        "data" => $list
    ]);