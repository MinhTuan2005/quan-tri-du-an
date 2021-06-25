<?php require_once  ('autoload/autoload.php');
    if(!isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này!'); location.href='index.php'</script>";
    }
    $edituser = $db->fetchID("user",intval($_SESSION['name_id']));
    
    
?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Thông Tin Của Bạn</a> </h3>
                            <!-- nội dung --> 
                            <form action="" method="post" role="form" class="form-horizontal"> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên thành viên</label>
                                        <div class="col-md-8">
                                            <input type="text" name="name" readonly="" class="form-control" value="<?php echo $edituser['name']  ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" name="email" readonly="" class="form-control" value="<?php echo $edituser['email'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số Điện Thoại</label>
                                        <div class="col-md-8">
                                            <input type="number" name="phone" readonly class="form-control" value="<?php echo $edituser['phone'] ?>">
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Địa Chỉ</label>
                                        <div class="col-md-8">
                                            <input type="text" name="address" readonly  class="form-control" value="<?php echo $edituser['address'] ?>">

                                        </div>
                                    </div>

                                </form> 
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>  