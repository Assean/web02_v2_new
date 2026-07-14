<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="games">
        <?php include_once "inc/header.php"; ?>
        <section class="game-list">
            <?php
                $games = $pdo->query("SELECT * FROM `games`")->fetchAll();
                foreach($games as $game){  
            ?>
            <div class="game-item border m-4 w-25 p-3">
                <img src="<?=$game['img']?>" class="game-cover w-75">
                <div class="game-title"><?=$game['title']?></div>
                <div class="game-description"><?=$game['description']?></div>
                <a href="game-play.php?id=<?=$game['id']?>" class="play-game-link btn btn-info">開始遊戲</a>
            </div>
            <?php } ?>
        </section>
    </div>
</body>
</html>