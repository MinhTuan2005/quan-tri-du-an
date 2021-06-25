<?php
    $open = "transaction";
     require_once  ('../../autoload/autoload.php'); 
    $limit = 10;
    $sql = "SELECT transaction.*, user.name as nameuser,user.phone as phoneuser,user.email as emailuser FROM transaction LEFT JOIN user ON transaction.user_id = user.id ORDER BY ID DESC ";
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
        
    $sql.= "LIMIT $start,$limit";
    $transaction = $db->fetchsql($sql);

    $path = $_SERVER['SCRIPT_NAME']; 

    $phanquyen= $_SESSION['admin_level'];
    

?>
<?php require_once  ('../../layout/headed.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Các Đơn Hàng
                        </h1>
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
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Thông Tin người mua</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Đơn Hàng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Note</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">ACtion</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                            <?php $stt = 1 ;foreach($transaction as $item) :?>
                               
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $stt ?></td>
                                <td>-  <?php echo $item['nameuser'] ?><br>
                                - <?php echo $item['phoneuser'] ?> <br>
                                - <?php echo $item['emailuser'] ?>
                                </td>
                                    
                                <td>
                                    <a href="donhang.php"> Thông tin đơn hàng</a>

                                </td>
                                <td><?php echo $item['note'] ?></td>
                                <td>
                                    <a href="xuli.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' :'btn-info' ?>"><?php echo $item['status'] == 0 ?'Chưa xử lý' :'Đã xử lý' ?></a>
                                </td>
                                <?php if($phanquyen == 1) :?> 
                                    <td>
                                        <a class ="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                        <i class="fa fa-times" ></i> Xóa</a>
                                    </td>
                                <?php else :?>
                                    <td>
                                        <a class ="btn btn-xs btn-danger" style="background-color:black" >
                                        <i class="fa fa-times" ></i> Xóa</a>
                                    </td>
                                <?php endif ?>
                            </tr>
                            
                            <?php $stt++ ; endforeach?>   
                        
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