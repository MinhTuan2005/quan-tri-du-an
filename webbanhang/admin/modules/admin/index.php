<?php
    require_once  ('../../autoload/autoload.php');     
    $admin = $db->fetchAll("amin") ;
    $phanquyen= $_SESSION['admin_level'];


?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">ADMIN
                            <?php if($phanquyen == 1) :?> 
                                <a href="add.php" class="btn btn-success">Thêm mới </a>
                            <?php else :?>
                                <a style="background-color:black"  class="btn btn-success">Thêm mới </a>
                            <?php endif ?>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending" style="width: 10px;">STT</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Tên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 50px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20px;">Level</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 80px;">ACtion</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1 ;foreach($admin as $item): ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                                <td><?php echo $item['phone'] ?></td>
                                <td><?php echo $item['level'] ?></td>
                                <?php if($phanquyen == 1) :?>   
                                <td>
                                    <a class ="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> 
                                    <i class="fa fa-edit" ></i> Sửa</a>
                                    <a class ="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                    <i class="fa fa-times" ></i> Xóa</a>
                                </td>
                                <?php else :?>
                                <td>
                                    <a class ="btn btn-xs btn-info" style="background-color:black"> 
                                    <i class="fa fa-edit" ></i> Sửa</a>
                                    <a class ="btn btn-xs btn-danger"style="background-color:black">
                                    <i class="fa fa-times" ></i> Xóa</a>
                                </td>
                                <?php endif ?>
                             <?php $stt++ ; endforeach ?>   
                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
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