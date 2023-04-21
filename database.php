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
