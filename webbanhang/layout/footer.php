<div class="container">
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo public_fontend() ?>images/free-shipping.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo public_fontend() ?>images/guaranteed.png"></a>
                    </div>
                    <div class="col-md-4 bottom-content">
                        <a href=""><img src="<?php echo public_fontend() ?>images/deal.png"></a>
                    </div>
                </div>
                <div class="container-pluid">
                <section id="footer">
                    <div class="container">
                        <div class="col-md-3" id="shareicon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100014640345391" target="blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8" id="title-block">
                            <div class="pull-left">
                                
                            </div>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                       
                    </div>
                </section>
                <section id="footer-button">
                    <div class="container-pluid">
                        <div class="container">
                            <div class="col-md-3" id="ft-about">
                                
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco </p>
                            </div>
                            <div class="col-md-3 box-footer" >
                                <h3 class="tittle-footer">my accout</h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Liên hệ </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Contact </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> My Account</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 box-footer">
                                <h3 class="tittle-footer">my accout</h3>
                               <ul>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Liên hệ </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i>  Contact </a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> My Account</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-angle-double-right"></i>
                                        <a href=""><i></i> Giới thiệu</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3" id="footer-support">
                                <h3 class="tittle-footer"> Liên hệ</h3>
                                <ul>
                                    <li>
                                        
                                        <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Đại Học ĐIện Lực  </p>
                                        <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 012345678</p>
                                        <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="ft-bottom">
                    <p class="text-center">Copyright © 2017 . Design by  ... !!! </p>
                </section>
            </div>
        </div>      
    </div>
            </div>      
        </div>
    <script  src="<?php echo base_url() ?>/public/fontend/<?php echo base_url() ?>/public/fontend/js/slick.min.js"></script>

    </body>
        
</html>

<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },function(){
            $hidenitem.hide(500);
        })
    })
    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $qty = $(this).parents("tr").find(".qty").val();
            $key = $(this).attr("data-key");
            $.ajax({
                url:'capnhatgiohang.php',
                type:'GET',
                data:{'qty':$qty,'key':$key},
                success:function(data)
                {
                    if(data == 1)
                    {
                        alert("cập nhật giỏ hàng thành công");
                        location.href="giohang.php";
                    }
                }
            });
        });
    });
</script>