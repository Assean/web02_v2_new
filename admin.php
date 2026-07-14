<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin">
        <?php include_once "inc/header.php"; ?>
        <div class="admin-btn m-3">
            <button class="btn btn-info" onclick="location.href='admin.php'">基本設定</button>
            <button class="btn btn-info" onclick="location.href='admin_result.php'">問卷回應</button>
            <button class="btn btn-info" onclick="location.href='admin_imgtable.php'">統計資料</button>
            <button class="btn btn-info" onclick="location.href='./form/'">前往表單頁面</button>
            <!-- <button class="save_btn btn btn-info w-25 mt-3">儲存</button> -->
        </div>
        <div class="admin-title h2 d-flex justify-content-center mt-3">後台管理-基本設定</div>
        <div class="admin-body">
            <form action="./api/admin_from_set.php" method="post" class="m-5">
                <?php
                    $time = $pdo->query("SELECT * FROM `admin_from`")->fetch();
                ?>
                <label for="status">是否啟用表單</label>
                    <select name="status" id="admin_status" class="w-25 form-control">
                        <option value="true" class="w-25 form-control" <?= ($time['status'] == 'true') ? 'selected' : ''; ?>>是</option>
                        <option value="false" class="w-25 form-control" <?= ($time['status'] == 'false') ? 'selected' : ''; ?>>否</option>
                    </select>

                <label for="time_start">開始時間</label>
                <input type="datetime-local" name="time_start" id="time_start"  class="w-25 form-control" value="<?=$time['time_start']?>" step="1">
                <label for="time_stop">結束時間</label>
                <input type="datetime-local" name="time_stop" id="time_stop"  class="w-25 form-control" value="<?=$time['time_stop']?>" step="1">
                <button class="save_btn btn btn-info w-25 mt-3">儲存</button>
            </form>
        </div>
    </div>
</body>
</html>