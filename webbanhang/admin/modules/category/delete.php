<?php
     require_once  ('../../autoload/autoload.php');
     $open = "category"; 
     
    //  $id = intval(getInput("id"));
    $id=$_GET['id'];

    $Editcategory = $db->fetchID("category",$id);

    
    if(empty($Editcategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }
        //kiểm tra xem danh mục có sản phẩm hay ko
    $is_delete = $db->fetchOne("product","category_id = $id ");
    if($is_delete == NULL)
    {
        $num=$db->delete("category",$id);
        if($num>0)
        {
            $_SESSION["success"]="Xóa thành công";
            redirectAdmin("category");

        }
        else{
            $_SESSION["error"]="Xóa không thành công";
        }
    }
    else{
        $_SESSION['error'] = "Danh mục vẫn còn sản phẩm bạn không thể xóa !!";
        redirectAdmin("category");
    }
?>