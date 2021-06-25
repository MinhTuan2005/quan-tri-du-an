<?php require_once  ('autoload/autoload.php');
        $data = 
        [
            "email"       => postInput('email'),
            "password"   => postInput('password')

        ];
        $error=[];
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {

            if($data['email'] == '')
            {
                $error['email']="chưa có email đăng nhập!";
            }
            if($data['password'] == '')
            {   
                $error['password']="Mật Khẩu không đc để trống!";
            }
            if(empty($error))
            {
                $is_check = $db->fetchOne("user","email = '".$data['email']."'AND password = '".md5($data['password'])."' ");
                
                if($is_check != NULL)
                {
                    $_SESSION['name_user']= $is_check['name'];
                    $_SESSION['name_id']= $is_check['id'];
                    echo "<script>alert('Đăng nhập Thành Công'); location.href='index.php'</script>";

                    
                }
                else{
                    $_SESSION['error']="Sai Mật Khẩu hoắc Email!!";
                }
                
            }
           
        }


?>
<?php require_once  ('layout/headed.php'); ?>
<div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Đăng Nhập Tài Khoản </a> </h3>
                            <!-- nội dung --> 
                            <?php  if(isset($_SESSION['success'])):?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?>
                            <?php  if(isset($_SESSION['error'])):?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                                </div>
                            <?php endif ?>
                            <form action="" method="post" role="form" class="form-horizontal"> 
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" class="form-control">
                                        <?php if(isset($error['email'])) :?>
                                            <p class="text-danger"><?php echo $error['email'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mật Khẩu</label>
                                    <div class="col-md-8">
                                        <input type="password" name="password" class="form-control">
                                        <?php if(isset($error['password'])) :?>
                                            <p class="text-danger"><?php echo $error['password'] ?></p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Đăng Nhập</button>
                            </form>
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 