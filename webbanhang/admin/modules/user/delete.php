<?php
     require_once  ('../../autoload/autoload.php');
     $open = "user"; 
     
    //  $id = intval(getInput("id"));
    $id=$_GET['id'];

    $Deleteuser = $db->fetchID("user",$id);

    if(empty($Deleteuser))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("user");
    }
    $num=$db->delete("user",$id);
    if($num>0)
    {
        $_SESSION["success"]="Xóa thành công";
        redirectAdmin("user");

    }
    else{
        $_SESSION["error"]="Xóa không thành công";
    }
?>