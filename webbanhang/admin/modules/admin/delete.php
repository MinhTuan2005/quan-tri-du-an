<?php
     require_once  ('../../autoload/autoload.php');
     $open = "amin"; 
     
    //  $id = intval(getInput("id"));
    $id=$_GET['id'];

    $Deleteadmin = $db->fetchID("amin",$id);

    if(empty($Deleteadmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }
    $num=$db->delete("amin",$id);
    if($num>0)
    {
        $_SESSION["success"]="Xóa thành công";
        redirectAdmin("admin");

    }
    else{
        $_SESSION["error"]="Xóa không thành công";
    }
?>