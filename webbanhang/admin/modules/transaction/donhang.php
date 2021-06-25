<?php
    require_once  ('../../autoload/autoload.php'); 
    // $id= 
    // dd($id);
    // $orders = $db->fetchID('orders',$id);
    // $cateID = intval($orders['product_id']);

    // $sql = "SELECT*FROM product WHERE id = $cateID ORDER BY ID DESC ";
 



    $sql = "SELECT orders.*, product.name as nameproduct,product.price as priceproduct,product.sale as saleproduct FROM orders LEFT JOIN product ON orders.product_id = product.id  ORDER BY ID DESC ";
    
    $order = $db->fetchsql($sql);
    // $cateID = intval($product['category_id']);


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                <form action="" method="post" role="form" class="form-horizontal"> 
                    <?php foreach($order as $value) :?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tên Sản Phẩm</label>
                                        <div class="col-md-8">
                                            <input type="text" name="name" readonly="" class="form-control" value="<?php echo $value['nameproduct'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tổng Tiền Đơn Hàng</label>
                                        <div class="col-md-8">
                                            <input type="email" name="email" readonly="" class="form-control" value="<?php echo $value['priceproduct'] ?>">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Giảm Giá :</label>
                                        <div class="col-md-8">
                                            <input type="number" name="phone" readonly class="form-control" value="<?php echo $value['saleproduct'] ?>">
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Số Lượng</label>
                                        <div class="col-md-8">
                                            <input type="text" name="address" readonly  class="form-control" value="<?php echo $value['qty'] ?>">

                                        </div>
                                    </div>
                                     
                                    <?php  endforeach?>
                                </form> 
                </main>
<?php require_once  ('../../layout/footer.php'); ?>