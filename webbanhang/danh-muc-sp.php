<?php require_once  ('autoload/autoload.php');

    $id= intval(getInput('id'));

    $Editcategory = $db->fetchID("category",$id);

    $limit = 4;
    $sql = "SELECT*FROM product WHERE category_id = $id";
    $total_records = $db->num_rows($sql);

    

    $total_pages = ceil($total_records/$limit);
 
    $current_page = 1;
    if(isset($_REQUEST["trang"]) && is_numeric($_REQUEST["trang"]))
    {
        $current_page = $_REQUEST["trang"];
    }
    if($current_page<=0)
        $current_page=1;
    if($current_page>$total_pages)
        $current_page = $total_pages;

    $start = ($current_page-1)*$limit;
        
    $sql= "SELECT*FROM product WHERE category_id = $id LIMIT $start,$limit";
    $product = $db->fetchsql($sql);

    $path = $_SERVER['SCRIPT_NAME'];
    

?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"><?php echo $Editcategory['name'] ?> </a> </h3>
                            <!-- nội dung --> 
                            <div class="showitem clearfix">
                                <?php foreach($product as $item): ?>
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
                                
                                <nav class="text-center" style="margin-top: 250px;">
                                        <ul class="pagination">
                                            <?php for ($i=1;$i<=$total_pages;$i++) :?>
                                            <li><a href="<?php echo $path ?>?id=<?php echo $id?>&&trang=<?php echo $i?>"><?php echo $i; ?></a></li>
                                            
                                            <?php endfor ?>
                                        </ul>

                                </nav>
                                </div>
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 