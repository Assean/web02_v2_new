<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
</head>
<body>
    <div id="form">
        <div class="admin_form_title h2 d-flex justify-content-center mt-3">意見調查表單</div>
        <div class="admin-body">
            <form action="../api/form_add.php" method="post" class="m-5">
                <label for="name">姓名</label>
                <input type="text" name="name" id="name" class="w-25 form-control" required >
                <label for="email">信箱</label>
                <input type="email" name="email" id="email" class="w-25 form-control" required >
                <label for="games">遊戲</label>
                <select name="game" id="game-select" class="w-25 form-control" required >
                    <?php
                        include_once "../api/db.php";
                        $games = $pdo->query("SELECT * FROM `games`")->fetchAll();
                        foreach($games as $game){
                    ?>
                    <option value="<?=$game['title']?>"><?=$game['title']?></option>
                    <?php } ?>
                </select>
                <label for="good_or_nono" >評價</label>
                <select name="good_or_nono" id="good_or_nono" class="w-25 form-control" required>
                    <option value="好">好</option>
                    <option value="不好">不好</option>
                </select>
                <label for="good_text">寶貴意見</label>
                <textarea name="good_text" id="good_text" class="w-25 form-control"></textarea>
                <button class="submit_btn btn btn-info w-25 mt-3">送出</button>
            </form>
            <a href="../index.php" class="btn btn-info w-25 mt-3">點我回首頁</a>
        </div>
    </div>
</body>
</html>