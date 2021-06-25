<?php
     require_once  ('../../autoload/autoload.php');
     $open = "category"; 
     
    //  $id = intval(getInput("id"));
    $id=$_GET['id'];

    $Deleteproduct = $db->fetchID("product",$id);

    if(empty($Deleteproduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
    }
    $num=$db->delete("product",$id);
    if($num>0)
    {
        $_SESSION["success"]="Xóa thành công";
        redirectAdmin("product");

    }
    else{
        $_SESSION["error"]="Xóa không thành công";
    }
?>