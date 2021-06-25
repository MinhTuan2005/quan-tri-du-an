

<?php
     require_once  ('../../autoload/autoload.php');
     $open = "category";         
    /* danh mục sản phẩm*/
    $category= $db->fetchAll("category");
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "name"       => postInput('name'),
            "slug"       => str_slug(postInput('name')),
            "category_id"=> postInput('category_id'),
            "price"      => postInput('price'),
            "content"    => postInput('content'),
            "number"     => postInput('number')

        ];

        $error=[];

        if(postInput('name') == '')
        {
            $error['name']="mời bạn nhập đủ tên sản phẩm";
        }
        if(postInput('category_id') == '')
        {
            $error['category_id']="mời bạn nhập đủ danh mục sản phẩm";
        }
        if(postInput('price') == '')
        {
            $error['price']="mời bạn nhập đủ giá sản phẩm";
        }
        if(postInput('price') >= 300000)
        {
            $error['price']="giá quá cao";
        }
        if(postInput('content') == '')
        {
            $error['content']="mời bạn nhập đủ thông tin của sản phẩm";
        }
        if(postInput('number') == '')
        {
            $error['number']="mời bạn nhập số lượng của sản phẩm";
        }
        if( ! isset($_FILES['thunbar']))
        {
            $error['thunbar']="mời bạn chọn hình ảnh cho sản phẩm";
        }
        /**error trống có nghĩa là ko có lỗi
         */
        if(empty($error))
        {
            if(isset($_FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp  = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_erro = $_FILES['thunbar']['error'];

                if($file_erro == 0)
                {
                    $part = ROOT."product/";
                    $data['thunbar']= $file_name;
                }

            };
            $id_insert = $db->insert("product",$data);
            if(isset($id_insert))
            {
                move_uploaded_file($file_tmp,$part.$file_name);
                $_SESSION["success"]="thêm mới thành công";
                redirectAdmin("product");

            }
            else{
                $_SESSION["error"]="thêm mới thất bại";
            }
            
        }
    }



?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm mới sản phẩm </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="clearfix"></div>
                        <?php if(isset($_SESSION["error"])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION["error"];unset($_SESSION["error"]); ?>
                                
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Danh mục sản phẩm  </label>
                                            <div class="col-sm-6">
                                                <select class="form-control col-md-8" name="category_id">
                                                    <option value="">Mời bạn nhập danh mục sản phẩm</option>
                                                    <?php foreach($category as $item): ?>
                                                        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <?php if(isset($error['category_id'])): ?>
                                                    <p class="text-danger"><?php echo $error['category_id'] ?></p>
                                                <?php endif ?>
                                            </div>
                                                
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập sản phẩm  </label>
                                             <div class="col-md-8">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="name">
                                                 <?php if(isset($error['name'])):  ?>
                                                 <p class="text-danger"><?php echo $error['name'] ?></p>
                                                 <?php endif ?>
                                                 <?php   ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Giá Sản Phẩm  </label>
                                             <div class="col-md-8">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="price">
                                                 <?php if(isset($error['price'])):  ?>
                                                 <p class="text-danger"><?php echo $error['price'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Giảm Giá  </label>
                                             <div class="col-sm-3">
                                                 <input type="number" class="form-control" id="inputEmail3" name="sale" value="0">

                                             </div>
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hình ảnh :  </label>
                                             <div class="col-sm-4">
                                                 <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                                                 <?php if(isset($error['thunbar'])):  ?>
                                                 <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Số Lượng Sản Phẩm  </label>
                                             <div class="col-md-8">
                                                 <input type="Text" class="form-control" id="inputEmail3" name="number">
                                                 <?php if(isset($error['number'])):  ?>
                                                 <p class="text-danger"><?php echo $error['number'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Miêu tả sản phẩm  </label>
                                             <div class="col-md-8">
                                                 <textarea class="form-control" name="content" row="10"></textarea>
                                                 <?php if(isset($error['content'])):  ?>
                                                 <p class="text-danger"><?php echo $error['content'] ?></p>
                                                 <?php endif ?>

                                             </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                            <div class="col-sm-10">
                                              <button type="submit" class="btn btn-success">Lưu</button>
                                            </div>
                                    </div>
                            </form>

                            </div>
                        </div>      
                    </div>
                </main>
<?php require_once  ('../../layout/footer.php'); ?>