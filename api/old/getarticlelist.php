<?php
    include_once "db.php";
    header('Content-Type:application/json;charset=UTF-8');
    $result = $pdo->query("SELECT * FROM `articles`");
    $articles = $result->fetchAll(PDO::FETCH_ASSOC);


    $list = [];


    foreach($articles as $row){
        $list[]=[
            "title"=> $row['title'],
            "date"=> $row['time'],
            "body"=> mb_substr($row['content'],0,100,"UTF-8")   
        ];
    }

    
    // print_r($list);
    echo json_encode([
         "success" => true,
         "data" => $list
        ]);