<?php require_once  ('autoload/autoload.php'); 
        $data=[];

        foreach($category as $item)
        {
            $cateID = intval($item['id']);
            $sql= "SELECT*FROM product WHERE category_id = $cateID";
            $producthome = $db->fetchsql($sql);
            $data[$item['name']]= $producthome;
        }
        
        // if(isset($_GET['keywork']) && !empty($_GET['keywork'])){
        //     $key = $_GET['keywork'];
        //     $sql = "SELECT*FROM product WHERE name LIKE '%$key%' OR price LIKE '%$key%' OR sale LIKE '%$key%' OR content LIKE '%$key%'";

        //     $product=$db->fetchsql($sql);
        // }
        

?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1" id="ketqua">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Tất Cả Sản Phẩm </a> </h3>
                            <!-- nội dung --> 
                            <?php foreach($data as $key =>$value) :?>
                        
                                    <div class="showitem">
                                      <?php foreach($value as $item): ?>
                                        <div class="col-md-3 item-product bor">
                                            <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                            </a>
                                            <div class="info-item">
                                                <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                                <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPricesale($item['price'],$item['sale']) ?></b></p>
                                            </div>
                                            <div class="hidenitem">
                                                <p><a href=""><i class="fa fa-search"></i></a></p>
                                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                                <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                            </div>
                                        </div>
                                      <?php endforeach ?>   
                                    </div> 
                                   
                            <?php endforeach ?> 
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 