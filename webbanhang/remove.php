<?php

        require_once  ('autoload/autoload.php');

        $key= intval(getInput('key'));

        unset($_SESSION['cart'][$key]);
        
        $_SESSION['success']="Xóa Thành Công";

        header("location: giohang.php");
?>