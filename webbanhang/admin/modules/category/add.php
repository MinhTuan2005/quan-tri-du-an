

<?php
     require_once  ('../../autoload/autoload.php');
     $open = "category";         
    
    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $data = 
        [
            "name" => postInput('name'),
            "slug"=> str_slug(postInput('name'))
        ];

        $error=[];
        if(postInput('name') == '')
        {
            $error['name']="mời bạn nhập đủ thông tin";
        }
        /**error trống có nghĩa là ko có lỗi
         */
        if(empty($error))
        {
            $isset = $db->fetchOne("category","name='".$data['name']." '");
           if(count($isset)>0)
           {
               $_SESSION['error']="tên danh mục đã tồn tại! mời nhập tên khác";

           }
           else{
               $id_insert = $db->insert("category",$data);
               if($id_insert > 0)
               {
                   $_SESSION['success']="thêm mới thành công";
                   redirectAdmin("category");
               }
               else{
                   $_SESSION['error']="thêm mới thất bại";
                   
                   
               }
           }
        }
    }


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm Mới Mặt Hàng </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="clearfix"></div>
                        <?php if(isset($_SESSION["error"])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION["error"];unset($_SESSION["error"]); ?>
                                
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="" method="POST">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập mặt hàng </label>
                                             <div class="col-sm-10">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="name">
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