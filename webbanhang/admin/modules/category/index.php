

<?php
    require_once  ('../../autoload/autoload.php');     
    $limit = 10;
    $sql = "SELECT*FROM category WHERE 1";
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
        
    $sql= "SELECT*FROM category WHERE 1 LIMIT $start,$limit";
    $category = $db->fetchsql($sql);

    $path = $_SERVER['SCRIPT_NAME'];   


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh mục sản phẩm
                            <a href="add.php" class="btn btn-success">Thêm mới </a>
                        </h1>
                        <div class="clearfix"></div>
                        <?php if(isset($_SESSION["success"])) : ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION["success"];unset($_SESSION["success"]); ?>
                                
                            </div>
                        <?php endif ?>
                        <?php if(isset($_SESSION["error"])) : ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION["error"];unset($_SESSION["error"]); ?>
                                
                            </div>
                        <?php endif ?>
                        <div class="row">
                        <div class="card-body">
                        <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending" style="width: 159px;">STT</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 249px;">Tên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 115px;">Slug</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 52px;">Create_at</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 112px;">ACtion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1 ;foreach($category as $item): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td><?php echo $item['created_at'] ?></td>
                                <td>
                                    <a class ="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> 
                                    <i class="fa fa-edit" ></i> Sửa</a>
                                    <a class ="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                    <i class="fa fa-times" ></i> Xóa</a>
                            </tr>
                             <?php $stt++ ; endforeach ?>   
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <?php for ($i=1;$i<=$total_pages;$i++) :?>
                                <li class="paginate_button page-item previous " ><a href="<?php echo $path ?>?trang=<?php echo $i?>" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link"><?php echo $i; ?></a></li>         
                            <?php endfor ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </div>   
                    </div>
                </main>
<?php require_once  ('../../layout/footer.php'); ?>
                
                


               