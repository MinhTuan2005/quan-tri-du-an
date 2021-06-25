<?php require_once  ('autoload/autoload.php'); 

?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)">  </a> </h3>
                            <!-- nội dung --> 
                            <?php  if(isset($_SESSION['success'])):?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?>
                            <a href="index.php" class="btn btn-success">Trờ Về Trang Chủ</a>
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 