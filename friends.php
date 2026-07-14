<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="friends-page">
        <?php include_once "inc/header.php"?>

        <!-- 使用者搜尋 -->
        <div class="friend-search-section m-3">
            <form action="./api/search_friend.php" method="post" class="friend-search-form m-3">
                <input type="text" class="search-input form-control w-25" name="search_key">
                <button class="search-submit-button btn btn-info m-2">搜尋</button>
            </form>
            <div class="search-result-list">
                <?php $results = $_SESSION['key_result'] ?? []?>
                <?php foreach($results as $result){?>
                <div class="search-result-item border m-3 p-3">
                    <div class="result-username"><?=$result['username']?></div>
                    <a href="./friend-page.php?username=<?=$result['username']?>" class="view-profile-link">前往個人頁面</a>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- 我的好友 -->
        <div class="friend-list-section">
            <div class="section-title h1 d-flex justify-content-center mt-5">好友列表</div>
            <?php
                $friends = $pdo->query("SELECT * FROM `friends` WHERE 
                (`send_user` = '{$_SESSION['user']}' OR `you_user` = '{$_SESSION['user']}') AND `status` = 'friend'");
                foreach($friends as $friend){
                    if($friend['send_user'] == $_SESSION['user']){
                        $you_user = $friend['you_user'];
                    }else{
                        $you_user = $friend['send_user'];
                    }
                $img_friend = $pdo->query("SELECT * FROM `users` WHERE `username` = '$you_user'")->fetch();
            ?>
            <div class="friend-item m-5 p-3">
                <img src="./assets/img/profile/<?=$img_friend['img']?>" class="friend-avatar"  width="110" height="110">
                <div class="friend-name" style="cursor: pointer;" onclick="location.href='friend-page.php?send_user=<?=$friend['send_user']?>&you_user=<?=$friend['you_user']?>&status=<?=$friend['status']?>&username=<?=$img_friend['username']?>'"><?=$you_user?></div>
            </div>
            <?php } ?>
        </div>
        <!-- 我收到的好友邀請 -->
        <div class="incoming-requsts-section">
            <div class="section-title h1 d-flex justify-content-center">收到的好友申請</div>
            <?php
                $requests_1 = $pdo->query("SELECT * FROM `friends` WHERE `you_user` = '{$_SESSION['user']}' AND `status` = 'pending'")->fetchAll();
                foreach($requests_1 as $request_1){
                    $img_request_1 = $pdo->query("SELECT * FROM `users` WHERE `username`= '{$request_1['send_user']}'")->fetch();
            ?>
            <div class="request-item m-5 p-3">
                <img src="./assets/img/profile/<?=$img_request_1['img']?>" width="110" height="110" class="request-avatar">
                <div class="request-username" style="cursor: pointer;" onclick="location.href='friend-page.php?send_user=<?=$friend['send_user']?>&you_user=<?=$friend['you_user']?>&status=<?=$friend['status']?>'"><?=$request_1['send_user']?></div>
                <button class="accept-request-button btn btn-success" onclick="location.href='./api/friend_yes.php?send_user=<?=$request_1['send_user']?>&you_user=<?=$request_1['you_user']?>&status=<?=$request_1['status']?>'">接受</button>
                <button class="rejuct-request-button btn btn-danger" onclick="location.href='./api/friend_no.php?send_user=<?=$request_1['send_user']?>&you_user=<?=$request_1['you_user']?>&status=<?=$request_1['status']?>'">拒絕</button>
            </div>
            <?php } ?>
        </div>
        <!-- 我發送的好友邀請 -->
        <div class="sent-requests-section">
            <div class="section-title h1 d-flex justify-content-center">發送的好友邀請</div>
            <?php
                $requests_2 = $pdo->query("SELECT * FROM `friends` WHERE `send_user` = '{$_SESSION['user']}' AND `status` = 'pending'")->fetchAll();
                foreach($requests_2 as $request_2){
                    $img_request_2 = $pdo->query("SELECT * FROM `users` WHERE `username`= '{$request_2['you_user']}'")->fetch();
            ?>
            <div class="request-item m-5 p-3">
                <img src="./assets/img/profile/<?=$img_request_2['img']?>" width="110" height="110" class="request-avatar">
                <div class="request-username" style="cursor: pointer;" onclick="location.href='friend-page.php?send_user=<?=$request_2['send_user']?>&you_user=<?=$request_2['you_user']?>&status=<?=$request_2['status']?>'"><?=$request_2['you_user']?></div>
                <button class="cancel-request-button btn btn-danger" onclick="location.href='./api/friend_not.php?send_user=<?=$request_2['send_user']?>&you_user=<?=$request_2['you_user']?>&status=<?=$request_2['status']?>'">取消</button>
            </div>
            <?php } ?>
        </div>

    </div>
</body>
</html>