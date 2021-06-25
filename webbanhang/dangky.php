<?php require_once  ('autoload/autoload.php'); 

        if(isset($_SESSION['name_id']))
        {
            echo "<script>alert('Bạn đã có tài khoản mời đăng xuất để đăng ký!');location.href='index.php'</script>";
        }

        $data = 
        [
            "name"       => postInput('name'),
            "email"      => postInput('email'),
            "phone"      => postInput('phone'),
            "address"    => postInput('address'),
            "password"   => postInput('password')

        ];
        $error=[];
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

            if($data['name'] == '')
            {
                $error['name']="Tên không đc để trống!";
            }
            if($data['email'] == '')
            {
                $error['email']="Email không đc để trống!";
            }
            else{
                $is_check = $db->fetchOne("user","email = '".$data['email']."'");
                if($is_check != NULL)
                {
                    $error['email']= " Email đã tồn tại!! ";
                }
            }
            if($data['phone'] == '')
            {
                $error['phone']="Só Điện THoại không đc để trống!";
            }
            if($data['address'] == '')
            {
                $error['address']="Địa Chỉ không đc để trống!";
            }
            if($data['password'] == '')
            {   
                $error['password']="Mật Khẩu không đc để trống!";
            }
            else{
                $data['password']=md5(postInput('password'));
            }
            if(empty($error))
            {
                $id_insert = $db->insert("user",$data);
                if($id_insert > 0)
                {
                    $_SESSION['success']="Đăng kí thành công ! Mời bạn đăng nhập";
                    header("location: dangnhap.php");

                }
                else{

                }
                
            }
           
        }

?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Đăng Ký Thành Viên </a> </h3>
                            <!-- nội dung --> 
                            <form action="" method="post" role="form" class="form-horizontal"> 
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Tên thành viên</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" value="<?php echo $data['name'] ?>">
                                        <?php if(isset($error['name'])) :?>
                                            <p class="text-danger"><?php echo $error['name'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control" value="<?php echo $data['email'] ?>">
                                        <?php if(isset($error['email'])) :?>
                                            <p class="text-danger"><?php echo $error['email'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mật Khẩu</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control" value="<?php echo $data['password'] ?>">
                                        <?php if(isset($error['password'])) :?>
                                            <p class="text-danger"><?php echo $error['password'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Số Điện Thoại</label>
                                    <div class="col-md-8">
                                        <input type="number" name="phone" class="form-control" value="<?php echo $data['phone'] ?>">
                                        <?php if(isset($error['phone'])) :?>
                                            <p class="text-danger"><?php echo $error['phone'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Địa Chỉ</label>
                                    <div class="col-md-8">
                                        <input type="text" name="address" class="form-control" value="<?php echo $data['address'] ?>">
                                        <?php if(isset($error['address'])) :?>
                                            <p class="text-danger"><?php echo $error['address'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Đăng Ký</button>
                            </form>
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 