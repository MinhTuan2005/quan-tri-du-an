<?php require_once  ('autoload/autoload.php'); 

    $data=[];

    foreach($category1 as $item)
    {
        $cateID = intval($item['id']);
        $sql= "SELECT*FROM product WHERE category_id = $cateID LIMIT 4";
        $producthome = $db->fetchsql($sql);
        $data[$item['name']]= $producthome;
    }

?>
<?php require_once  ('layout/headed.php'); ?>
                <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="<?php echo public_fontend() ?>images/banner.jpg" class="img-thumbnail" width="830px" height="300px">
                        </section>

                        <section class="box-main1">
                            <?php foreach($data as $key =>$value) :?>
                                <?php if(!empty($value)):?>
                                <h3 class="title-main" style="text-align: center;margin-top:10px;"><?php echo $key ?> </h3>
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
                                 <?php endif ?>   
                            <?php endforeach ?> 

                            
                        </section>

                    </div>
                </div>
<?php require_once  ('layout/footer.php'); ?>                
                

 