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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <title>記帳本</title>
</head>

<body>
    <div class="container">
        <div class="contain">
            <div class="head">
                <h1>記帳紀錄</h1>
                <a href="?logout"><button class="logout btn btn-secondary">登出</button></a>
            </div>

            <table id="account-table" class="mt-3 mb-3">
                <thead>
                    <th>購買日期</th>
                    <th>購買物品名稱</th>
                    <th colspan="2">購買物品金額</th>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-05-05</td>
                        <td>鉛筆</td>
                        <td>20</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#remark1">查看備註</button>
                            <button id="1" class="btn btn-warning mx-sm-1"
                                style="float: right; white-space: nowrap;">修改</button>
                            <form class="edit_form" method="POST" onsubmit="return myform();">
                                <input type="hidden" name="id" value="">
                                <input type="submit" name="del" class="btn btn-danger mt-sm-0 mt-1"
                                    style="float: right; white-space: nowrap;" value="刪除"></input>
                            </form>
                        </td>
                    </tr>
                    <tr id="1" class="edit_panel" status="hide">
                        <td colspan="5">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="">
                                <input type="text" name="item" placeholder="購買物品名稱" value="鉛筆"><br>
                                <input type="number" name="price" placeholder="購買物品金額" value="20"><br>
                                <input type="text" name="remark" placeholder="備註" value="美術課要用的">
                                <input type="submit" name="edit" class="btn btn-warning" value="確認修改">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <a class="add" href="./add.php">新增</a>

        <!-- 以下為備註的彈出視窗 -->
        <div class="modal fade" id="remark1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">備註</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        美術課要用的
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    function myform() {
        let ans = confirm("確認要刪除此筆資料嗎?");
        if (ans) {
            return true;
        } else {
            return false;
        }
    }
</script>