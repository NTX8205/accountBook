<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/login.css">
    <title>註冊</title>
</head>

<body>
    <div class="container">
        <div class="card card-body">
            <h1 class="header mb-5 pb-3">註冊</h1>
            <form action="database.php" method="POST">
                <div class="input_place">
                    <label class="mr-5" for="name"><i class='bx bx-user-circle'></i></label>
                    <input type="text" name="name" placeholder="使用者名稱" required>
                </div>
                <div class="input_place">
                    <label for="password"><i class='bx bx-lock-alt'></i></label>
                    <input type="password" name="password" placeholder="密碼" required>
                </div>
                <?php if (isset($_GET['faild'])): ?>
                    <span>註冊失敗</span>
                <?php endif ?>
                <input class="btn btn-secondary" name="register" type="submit" value="立即註冊">
            </form>
            <a style="width: fit-content;" href="./login.php">已有帳號，登入</a>
        </div>
    </div>
</body>

</html>