<?php
     session_start();
     require_once  ('libraries/database.php');
     require_once  ('libraries/function.php');  
     $db = new database;

     define("ROOT",$_SERVER['DOCUMENT_ROOT']."/WEBBANHANG/public/uploads/");

     $category = $db->fetchAll("category");

     //lấy 2 sản phẩm trong cate
     $sqldanhmuc= "SELECT*FROM category WHERE 1  LIMIT 2";
     $category1=$db->fetchsql($sqldanhmuc);
     // lấy danh sach sản phẩm mới
     $sqlNew= "SELECT*FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
     $productNew= $db->fetchsql($sqlNew);

     $sqlPay = "SELECT*FROM product WHERE 1 ORDER BY PAY DESC LIMIT 4";
     $productPay = $db->fetchsql($sqlPay);


?>