<?php require_once  ('autoload/autoload.php');

    if(!isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này!'); location.href='index.php'</script>";
    }
    $id= intval(getInput('id'));


   $product = $db->fetchID("product",$id);

    //kiểm tra nếu kp tồn tại thì  tạo mới còn ko thì update
    if(!isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['qty'] = 1;
        $_SESSION['cart'][$id]['name']= $product['name'];
        $_SESSION['cart'][$id]['thunbar']= $product['thunbar'];
        $_SESSION['cart'][$id]['price'] = ((100-$product['sale'])*$product['price'])/100;
    }
    else{
        
        $_SESSION['cart'][$id]['qty'] += 1;

    } 
    echo "<script>alert('Đã Thêm vào giỏ hàng'); location.href='giohang.php'</script>";

?>