<?php
     require_once  ('../../autoload/autoload.php');
     $open = "transaction"; 
     
    //  $id = intval(getInput("id"));
    $id=$_GET['id'];

    $Deletetransaction = $db->fetchID("transaction",$id);

    if(empty($Deletetransaction))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("transaction");
    }
    $num=$db->delete("transaction",$id);
    if($num>0)
    {
        $_SESSION["success"]="Xóa thành công";
        redirectAdmin("transaction");

    }
    else{
        $_SESSION["error"]="Xóa không thành công";
    }
?>