<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>trang admin</title>
        <link href="<?php echo base_url() ?>public/admin/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <p class="navbar-brand">Xin Chào <?php echo $_SESSION['admin_name'] ?></p>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../../dangxuat.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav" >
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" class="<?php echo isset($open) && $open == "category" ? 'active' : '' ?>" href="../category/index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                                Danh mục sản phẩm
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" class="<?php echo isset($open) && $open == "product" ? 'active' : '' ?>" href="../product/index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" ></i></div>
                                Sản Phẩm
                            </a>
                            
                            <a class="nav-link" class="<?php echo isset($open) && $open == "amin" ? 'active' : '' ?>" href="../admin/index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle" ></i></div>
                                ADMIN
                            </a>
                            <a class="nav-link" class="<?php echo isset($open) && $open == "user" ? 'active' : '' ?>" href="../user/index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area" ></i></div>
                                Người Dùng
                            </a>
                            <a class="nav-link" class="<?php echo isset($open) && $open == "transaction" ? 'active' : '' ?>" href="../transaction/index.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area" ></i></div>
                                Quản Lí Đơn Hàng
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>