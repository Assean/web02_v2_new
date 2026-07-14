<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FunTech</title>
</head>
<body>
    <div id="register">
        <?php include_once "inc/header.php"; ?>
        <form action="./api/register.php" method="post" class="register-form m-5">
            <div class="username">
                <label for="username">帳號</label>
                <input type="text" class="username-input w-25 form-control" name="username">
            </div>
            <div class="email">
                <label for="email">電子郵件</label>
                <input type="text" class="email-input w-25 form-control" name="email">
            </div>
            <div class="password">
                <label for="password">密碼</label>
                <input type="password" class="password-input w-25 form-control" name="password">
            </div>
            <div class="password-confirm-input">
                <label for="password-confirm-input">密碼</label>
                <input type="password" class="password-confirm-input w-25 form-control" name="password-confirm">
            </div>
            <button class="register-submit-input btn btn-info mt-3 w-25">送出</button>
        </form>
    </div>
</body>
</html>