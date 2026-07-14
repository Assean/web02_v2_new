<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="admin">
        <?php 
        include_once "inc/header.php"; 

        if (isset($_GET['action'])) {
            if ($_GET['action'] === 'csv' || $_GET['action'] === 'json') {
                ob_end_clean();
                $type = $_GET['action'];
                $data = $pdo->query("SELECT id, name, email, good_or_nono, good_text FROM `form_result`")->fetchAll(PDO::FETCH_ASSOC);

                header("Content-Disposition: attachment; filename=\"問卷回應資料_" . date('Ymd_His') . ".{$type}\"");

                if ($type === 'csv') {
                    header('Content-Type: text/csv; charset=utf-8');
                    echo "\xEF\xBB\xBF"; 
                    $out = fopen('php://output', 'w');
                    fputcsv($out, ['id', '姓名', '電子郵件', '評價', '寶貴意見']); 
                    foreach ($data as $row) {
                        fputcsv($out, $row); 
                    }
                    fclose($out);
                } else {
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); 
                }
                exit; 
            }
        }
        ?>

        <div class="admin-btn m-3">
            <button class="btn btn-info" onclick="location.href='admin.php'">基本設定</button>
            <button class="btn btn-info" onclick="location.href='admin_result.php'">問卷回應</button>
            <button class="btn btn-info" onclick="location.href='admin_imgtable.php'">統計資料</button>
            <button class="btn btn-info" onclick="location.href='./form/'">前往表單頁面</button>
            
            <button class="btn btn-success" onclick="location.href='?action=csv'">下載 CSV</button>
            <button class="btn btn-warning text-white" onclick="location.href='?action=json'">下載 JSON</button>
        </div>

        <div class="admin-title h2 d-flex justify-content-center mt-3">後台管理-問卷回應</div>

        <table class="table-hover m-5" border>
            <tr>
                <td class="p-3">id</td>
                <td class="p-3">姓名</td>
                <td class="p-3">電子郵件</td>
                <td class="p-3">評價</td>
                <td class="p-3">寶貴意見</td>
                <td class="p-3">操作</td>
            </tr>
            <?php 
                $results = $pdo->query("SELECT * FROM `form_result`")->fetchAll();
                foreach($results as $result){
            ?>
            <tr>
                <td class="p-3"><?=$result['id']?></td>
                <td class="p-3"><?=$result['name']?></td>
                <td class="p-3"><?=$result['email']?></td>
                <td class="p-3"><?=$result['good_or_nono']?></td>
                <td class="p-3"><?=$result['good_text']?></td>
                <td class="p-3">
                    <button class="btn btn-danger m-4" onclick="location.href='./api/admin_result_del.php?id=<?=$result['id']?>'">刪除</button>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
</body>
</html>