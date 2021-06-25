<?php require_once  ('autoload/autoload.php');

    $user = $db->fetchID("user",intval($_SESSION['name_id']));
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "amount"       => $_SESSION['total'],
            "user_id"      => $_SESSION['name_id'],
            "note"         => postInput('note')

        ];
        $idtran = $db->insert("transaction",$data);
        if($idtran>0)
        {
            foreach($_SESSION['cart'] as $key => $item )
            {
                $data2 = 
                [
                    "transaction_id"       => $idtran,
                    "product_id"           => $key,
                    "qty"                  => $item['qty'],
                    "price"                => $item['price']

                ];
                $id_insert = $db->insert("orders",$data2);

            }
            unset($_SESSION['cart']);
            unset($_SESSION['total']);
            $_SESSION['success']="Đã lưu thông tin đơn hàng chúng tôi sẽ liên hệ với bạn sớm nhất!!";
            header("location: thongbao.php");
        }
    }


?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Thanh Toán Đơn Hàng</a> </h3>
                            <!-- nội dung -->
                                <form action="" method="post" role="form" class="form-horizontal"> 
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên thành viên</label>
                                        <div class="col-md-8">
                                            <input type="text" name="name" readonly="" class="form-control" value="<?php echo $user['name'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <input type="email" name="email" readonly="" class="form-control" value="<?php echo $user['email'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số Điện Thoại</label>
                                        <div class="col-md-8">
                                            <input type="number" name="phone" readonly="" class="form-control" value="<?php echo $user['phone'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số Tiền</label>
                                        <div class="col-md-8">
                                            <input type="text" readonly="" class="form-control" value="<?php echo formatPrice($_SESSION['total']); ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Địa Chỉ</label>
                                        <div class="col-md-8">
                                            <input type="text" name="address" readonly="" class="form-control" value="<?php echo $user['address'] ?>">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Ghi Chú</label>
                                        <div class="col-md-8">
                                            <input type="text" name="note"  class="form-control">

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success col-md-3 col-md-offset-5" style="margin-bottom: 20px;">Thanh Toán</button>

                                    <button type="submit" class="btn btn-success col-md-3 col-md-offset-5" style="margin-bottom: 20px;"><a href="http://localhost/WEBBANHANG/vnpay_php/index.php">Thanh Toán ONLINE</a></button>
                                </form> 
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 