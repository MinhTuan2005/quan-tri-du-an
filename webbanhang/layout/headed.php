
<html>
    <head>
        <title>Sạch Shop : Lập Trình Web PHP</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/fontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/fontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>/public/fontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>/public/fontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/fontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/fontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/public/fontend/css/style3.css">
        <script  src="<?php echo base_url() ?>/public/fontend/js/jquery.min.js"></script>

</script>
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Nghiêm Minh Tuấn - <b>18810310260 - CNPM3</b>
                                <a>Hà Đình Long     - <b>18810310223 - CNPM3</b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php  if(isset($_SESSION['name_user'])):?>
                                            <li><a href="thongtin.php"  style="color:green">Xin Chào :  <?php echo $_SESSION['name_user'] ?></a></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài Khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="thongtin.php">Thông Tin</a></li>
                                                    <li><a href="giohang.php">Giỏ Hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o">Đăng Xuất</i></a></li>
                                                </ul>
                                            </li>
                                    
                                        <?php else: ?>
                                            <li>
                                                <a href="dangnhap.php"><i class="fas fa-user-circle"></i>Đăng Nhập</a>
                                            </li>
                                            <li>
                                                <a href="dangky.php"><i class="fa fa-unlock"></i>Đăng Ký</a>
                                            </li>
                                            
                                        <?php endif ?>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" action="http://localhost/WEBBANHANG/shop.php" method="get">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <option> All Category</option>
                                            
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" id="keywork" placeholder=" tìm kiếm" class="form-control" value="<?php echo (isset($_GET['keywork']) ? $_GET['keywork'] : ''  ) ?>">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="<?php echo public_fontend()?>images/lo-go1.png" >
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0936004631</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>            
                            <li>
                                <a href="contac.php">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="giohang.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach($category as $item): ?>
                                <li><a href="danh-muc-sp.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($productNew as $item): ?>
                                    <li class="clearfix">
                                        <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="70px" height="60px">
                                            <div class="info pull-right">
                                                <p class="name"><?php echo $item['name'] ?></p >
                                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach ?>                                
                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm Bán CHạy </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach($productPay as $item): ?>
                                        <li class="clearfix">
                                            <a href="chi-tiet-sp.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="70px" height="60px">
                                                <div class="info pull-right">
                                                    <p class="name"><?php echo $item['name'] ?></p >
                                                    <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                                    <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                                    <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach ?>           
                                
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>