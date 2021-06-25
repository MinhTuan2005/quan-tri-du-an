<?php
    require_once  ('../../autoload/autoload.php');
    $open = "category"; 
     
    $id = intval(getInput('id'));
    // $id=$_GET['id'];
    //     echo $id;

    $Editcategory = $db->fetchID("category",$id);

    if(empty($Editcategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    
    if($_SERVER["REQUEST_METHOD"] == "POST")
     {
        $data = 
        [                           
            "name" => postInput('name')
        ];

        $error=[];
        if(postInput('name') == '')
        {
            $error['name']="mời bạn nhập đủ thông tin";
        }
        /**error trống có nghĩa là có lỗi
         */
        if(empty($error))
        {   //kiểm tra
            if($Editcategory['name'] !=$data['name'])
            {
                $isset = $db->fetchOne("category","name='".$data['name']." '");
                if(count($isset)>0)
                {
                    $_SESSION['error']="tên danh mục đã tồn tại! mời nhập tên khác";
     
                }
                else{
                    $id_update = $db->update("category",$data,array("id"=>$id));
                    if($id_update > 0)
                    {
                        $_SESSION['success']="cập nhật thành công";
                        redirectAdmin("category");
                    }
                    else{
                        $_SESSION['error']="cập nhật thất bại";
                        redirectAdmin("category");
                    }   
                }

            }
      
        }
    }


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SỬA </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="" method="POST">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập hàng  </label>
                                             <div class="col-sm-10">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="name" value="<?php echo $Editcategory['name']?>"> 
                                                 <?php if(isset($error['name'])):  ?>
                                                 <p class="text-danger"><?php echo $error['name'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                              <button type="submit" class="btn btn-success">Lưu</button>
                                            </div>
                                    </div>
                            </form>

                            </div>
                        </div>      
                    </div>
                </main>
<?php require_once  ('../../layout/footer.php'); ?>