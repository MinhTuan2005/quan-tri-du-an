<?php require_once  ('autoload/autoload.php');
    $sum=0;
    if(!isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này!'); location.href='index.php'</script>";
    }

    if(!isset($_SESSION['cart']) | count($_SESSION['cart']) ==0 )
    {
        echo "<script>alert('Không Có Sản Phẩm Trong Giỏ Hàng'); location.href='index.php'</script>";
    }
?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href=""> Giỏ Hàng Của Bạn </a> </h3>
                            <!-- nội dung -->
                            <?php  if(isset($_SESSION['success'])):?>
                                <div class="alert alert-success">
                                    <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                                </div>
                            <?php endif ?> 
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Hình Ảnh</th>
                                        <th>Giá</th>
                                        <th>Tổng Tiền</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1;foreach($_SESSION['cart'] as $key=>$item): ?>
                                        <tr>
                                            <td><?php echo $stt ?></td>
                                            <td><?php echo $item['name'] ?></td>
                                            <td>
                                                <input type="number" name="qty" value="<?php echo $item['qty'] ?>" class="form-control qty" id="qty" min="0" max="100"> 
                                            </td>
                                            <td>
                                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" width="80px" height="70px">
                                            </td>
                                            <td><?php echo formatPrice($item['price']) ?></td>
                                            <td><?php echo formatPrice($item['price']*$item['qty']) ?></td>
                                            <td>
                                                <a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove"></i> Remove</a>
                                                <a href="" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?> ><i class="fa fa-refresh"></i>Update</a>
                                            </td>
                                        </tr>
                                        <?php $sum += $item['price']*$item['qty']; $_SESSION['tongtien'] = $sum ;?>
                                    <?php $stt ++ ;endforeach?> 
                                </tbody>
                            </table>
                            <div class="col-md-5 pull-right">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>Thông Tin Đơn Hàng</h3></li>
                                    <li class="list-group-item">
                                        <span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                                        Số Tiền
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge">10%</span>
                                        Thuế VAT
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge"><?php echo sale($_SESSION['tongtien']) ?>%</span>
                                        Giảm Giá
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien']*110/100; echo formatPrice($_SESSION['total']) ?></span>
                                        Tổng Tiền Thanh Toán
                                    </li>
                                    <li class="list-group-item">
                                        <a href="index.php" class="btn btn-success" style="margin-right:40px">Tiếp Tục Mua Hàng</a>
                                        <a href="thanhtoan.php" class="btn btn-success">Thanh Toán</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 