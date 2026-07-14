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
        <section class="game-play">
            <?php
                $id = $_GET['id'];
                $game = $pdo->query("SELECT * FROM `games` WHERE `id` = '$id'")->fetch();
            ?>
            <div class="current-game-title"><?=$game['title']?></div>
            <section class="game-area">
                <iframe src="<?=$game['url']?>" width="500" height="500" frameborder="0" class="game-frame"></iframe>
            </section>
        </section>
        
        <aside class="game-leaderboard">
            <div class="leaderboard-title h1 d-flex justify-content-center">排行榜</div>
            <?php
                $api_url = "http://localhost/competition/56J17_N/web02_v2_new/assets/games/$id/api/pull_score.php";
                $scores = json_decode(@file_get_contents($api_url),true);
                if(!$scores){
            ?>
                <div class="leaderboard-item">目前尚無分數紀錄</div>
                    <!-- <div class='leaderboard-item'>
                        <div class='player-rank'>第 $k+1 名 | 玩家：$name ?> | 分數：$v['分數'] ?></div>
                    </div> -->
                    <?php }else{ ?>
                    <table border class="table table-hover m-3 w-75">
                        <tr class="leaderboard-item">
                            <td>名次</td>
                            <td>玩家名稱</td>
                            <td>分數</td>
                        </tr>
                    <?php
                            foreach($scores as $k => $v){
                            $name = $v['玩家名稱'];
                    ?>
                        <tr class="leaderboard-item">
                            <td> <?= $k+1 ?> </td>
                            <td> <?=$name?> </td>
                            <td> <?=$v['分數']?> </td>
                        </tr>
                        <?php }} ?>
                    </table>
        </aside>
    </div>
</body>
</html>