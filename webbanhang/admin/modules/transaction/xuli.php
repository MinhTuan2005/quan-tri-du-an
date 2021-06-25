<?php
     require_once  ('../../autoload/autoload.php');
        
    /* danh mục sản phẩm*/
    $id = intval(getInput('id'));
    // $id=$_GET['id'];
    //     echo $id;

    $Edittran= $db->fetchID("transaction",$id);

    if(empty($Edittran))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("transaction");
    }
    $status = $Edittran['status'] == 0 ? 1 :0;
    $update = $db->update("transaction",array("status"=> $status),array("id"=>$id));
    if($update>0)
    {
        $_SESSION['success']="Cập nhật thành công";
        redirectAdmin("transaction");
    }
    else{
        $_SESSION['error']="cập nhật thất bại";
        redirectAdmin("transaction");


    }
?>