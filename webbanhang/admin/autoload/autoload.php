<?php
     session_start();
     require_once  ('../../../libraries/database.php');
     require_once  ('../../../libraries/function.php');  
     $db = new database;

     define("ROOT",$_SERVER['DOCUMENT_ROOT']."/WEBBANHANG/public/uploads/");

     if(!isset($_SESSION['admin_id']))
     {
          header("location: /WEBBANHANG/login/");
     }
     
?>