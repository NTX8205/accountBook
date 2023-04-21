<?php
     session_start();
     function dbConnect()
     {
         $db_type = 'mysql'; //資料庫類型
         $db_host = 'localhost'; //資料庫主機名
         $db_name = 'money'; //資料庫名稱
         $db_user = 'root'; //用戶名
         $db_password = ''; //密碼
         $dbconnect = $db_type.":host=".$db_host.";dbname=".$db_name; //數據源
         $db = new PDO($dbconnect, $db_user, $db_password); //初使化一個PDO對象(數據源，用戶，密碼)
         $db->query("SET NAMES UTF8"); //資料可能有亂碼，所以需要設定成 UTF8
         return $db;
     }
     function createAccount($name, $item, $price, $remark, $date)
     {
        $db = dbConnect(); //連線到資料庫
        $sql = "INSERT INTO `book` (`name`, `item`, `price`, `remark`, `date`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $item, $price, $remark, $date]);
     }

     function getUserBook()
     {
         $db = dbConnect(); //連線到資料庫
         $sql = "SELECT * FROM `book` Where `name` = ?";
         $stmt = $db->prepare($sql);
         $stmt->execute([$_SESSION['name']]); //當前登入的使用者
         return $stmt->fetchAll();
     }

     function editAccount($id, $item, $price, $remark)
     {
        $db = dbConnect();
        $sql = "UPDATE `book` SET `item` = ?, `price` = ?, `remark` = ? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$item, $price, $remark, $id]);
     }

     function deleteAccount($id)
     {
        $db = dbConnect();
        $sql = "DELETE FROM book WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
     }

     function registerAccount($name, $password)
     {
        $db = dbConnect();
        $sql = "INSERT INTO `user`(`name`, `password`) VALUES (?,?)";
        $password = password_hash($password, PASSWORD_BCRYPT); //將密碼進行加密
        $stmt = $db->prepare($sql);
        if($stmt->execute([$name, $password])) {
            $_SESSION['name'] = $name; //將使用名稱以 session 方式儲存
            header("location: ./homepage.php"); //註冊成功後跳轉首頁
        }else{
            //註冊失敗的話返回註冊畫面，並傳送 faild
            //告訴瀏覽器註冊失敗了
            header("location: ./register.php?faild");
        }
     }

     function loginAccount($name, $inputPwd)
     {
        $db = dbConnect();
        $sql = "SELECT * FROM `user` WHERE `name` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch();

        if (password_verify($inputPwd, $result['password'])) {
            $_SESSION['name'] = $name; //將使用名稱以 session 方式儲存
            header("location: ./homepage.php"); //登入成功後跳轉首頁
        } else {
            //登入失敗的話返回登入畫面，並傳送 faild
            //告訴瀏覽器登入失敗了
            header("location: ./login.php?faild");
        }
     }

     if(isset($_POST['add'])){
        $name = $_SESSION['name']; //當前登入的使用者
        $item = $_POST['item']; //新增的物品名稱
        $price = $_POST['price']; //新增物品的金額
        $remark = $_POST['remark']; //這筆帳目的備註
        $date = date("Y-m-d", time()); //獲取當前時間(20XX-XX-XX)
        createAccount($name, $item, $price, $remark, $date); //執行新增帳目的function
        header("location: homepage.php"); //跳轉記帳本頁面
     }

     if(isset($_POST['edit'])){
        $id = $_POST['id']; //要修改的id
        $item = $_POST['item']; //修改物品的名稱
        $price = $_POST['price']; //修改物品的金額
        $remark = $_POST['remark']; //這筆帳目的備註
        editAccount($id, $item, $price, $remark); //執行修改帳目的function
        header("location: homepage.php"); //跳轉記帳本頁面
     }

     if (isset($_POST['del'])) {
        $id = $_POST['id']; //要刪除的id
        deleteAccount($id); //執行刪除帳目的function
        header("location: homepage.php"); //跳轉記帳本頁面
     }
    
     if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        registerAccount($name, $password); //執行註冊帳號的function
     }
    
     if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        loginAccount($name, $password); //執行登入帳號的function
     }
    