

<?php
     require_once  ('../../autoload/autoload.php');
     $open = "amin";         
    /* danh mục sản phẩm*/
    $id = intval(getInput('id'));
    // $id=$_GET['id'];
    //     echo $id;

    $Editadmin= $db->fetchID("amin",$id);

    if(empty($Editadmin))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name"       => postInput('name'),
            "email"      => postInput('email'),
            "phone"      => postInput('phone'),
            "address"    => postInput('address'),
            "level"      => postInput('level')

        ];

        $error=[];

        if(postInput('name') == '')
        {
            $error['name']="mời bạn nhập tên tài khoản";
        }
        if(postInput('email') == '')
        {
            $error['email']="mời bạn nhập email";
        }
        else{
            if(postInput('email') != $Editadmin['email'])
            {
                $is_check = $db->fetchOne("amin","email = '".$data['email']."'");
                if($is_check != NULL)
                {
                    $error['email']= " Email đã tồn tại!! ";
                }
            }
        }
        /* update */
        if(postInput('phone') == '')
        {
            $error['phone']="bạn chưa nhập số điện thoại";
        }
        if(postInput('address') == '')
        {
            $error['address']="bạn chưa nhập địa chỉ";
        }
        if(postInput('password') != NULL && postInput('re_password')!= NULL)
        {
            if(postInput('password') != postInput('password'))
            {
                $error['password'] = " mật khẩu trùng với mật khẩu cũ"; 
            }
            else{
                $data['password'] = md5(postInput('password'));
            }
        }

        /**error trống có nghĩa là ko có lỗi
         */
        if(empty($error))
        {
            $id_update = $db->update("amin",$data,array("id"=>$id));
            if($id_update > 0)
            {
                $_SESSION["success"]="cập nhật thành công";
                redirectAdmin("admin");

            }
            else{
                $_SESSION["error"]="cập nhật thất bại";
                redirectAdmin("admin");
            }
            
        }
    }


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tạo mới admin </h1>
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
                            <form action="" method="POST" enctype="multipart/form-data">                                  
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Họ Và Tên  </label>
                                             <div class="col-md-8">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="name" value="<?php echo $Editadmin['name'] ?>">
                                                 <?php if(isset($error['name'])):  ?>
                                                 <p class="text-danger"><?php echo $error['name'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email  </label>
                                             <div class="col-md-8">
                                                 <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $Editadmin['email'] ?>">
                                                 <?php if(isset($error['email'])):  ?>
                                                 <p class="text-danger"><?php echo $error['email'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone </label>
                                             <div class="col-sm-3">
                                                <input type="number" class="form-control" id="inputEmail3" name="phone" value="<?php echo $Editadmin['phone'] ?>">
                                                <?php if(isset($error['phone'])):  ?>
                                                 <p class="text-danger"><?php echo $error['phone'] ?></p>
                                                 <?php endif ?>
                                             </div>
                                    </div>        
                    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mật Khẩu  </label>
                                             <div class="col-md-8">
                                                 <input type="password" class="form-control" id="inputEmail3" name="password" value="<?php echo $Editadmin['password'] ?>">
                                                 <?php if(isset($error['password'])):  ?>
                                                 <p class="text-danger"><?php echo $error['password'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập lại mật khẩu  </label>
                                             <div class="col-md-8">
                                                 <input type="password" class="form-control" id="inputEmail3" name="re_password">
                                                 <?php if(isset($error['re_password'])):  ?>
                                                 <p class="text-danger"><?php echo $error['re_password'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>    
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Địa Chỉ  </label>
                                             <div class="col-md-8">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="address" value="<?php echo $Editadmin['address'] ?>">
                                                 <?php if(isset($error['address'])):  ?>
                                                 <p class="text-danger"><?php echo $error['address'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>   
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Level </label>
                                             <div class="col-md-8">
                                                 <select name="level" class="form-control">
                                                        <option value="1">Cộng Tác Viên</option>
                                                        <option value="2">Admin</option>
                                                 </select>
                                                 <?php if(isset($error['level'])):  ?>
                                                 <p class="text-danger"><?php echo $error['level'] ?></p>
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