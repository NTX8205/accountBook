<?php
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
         $stmt->execute(['john']); //假設當前用戶名為john
         return $stmt->fetchAll();
     }

     function editAccount($id, $item, $price, $remark)
     {
        $db = dbConnect();
        $sql = "UPDATE `book` SET `item` = ?, `price` = ?, `remark` = ? WHERE `id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$item, $price, $remark, $id]);
     }


     if(isset($_POST['add'])){
        $name = 'john'; //假設用戶名為john
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
