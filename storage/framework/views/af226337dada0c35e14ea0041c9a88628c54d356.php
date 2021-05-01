<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name')); ?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(url('public/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('public/dist/css/adminlte.min.css')); ?>">
    <!-- Bootstrap CDN -->
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo e(url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo e(url('public/plugins/toastr/toastr.min.css')); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
    <!--Select2 CSS-->

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <nav class="main-header navbar navbar-expand  bg-gradient-primary navbar-dark navbar">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo e(url('MasterBalanceTransfer')); ?>" class="nav-link">Balance Transfer</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" class="nav-link">Balance Transfer</a>
        </li> -->
            </ul>
            <!-- Button trigger modal -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="badge badge-danger navbar-badge">3</span>
          </a> -->
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <!-- <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div> -->
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <!-- <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div> -->
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <!-- <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Settings
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div> -->
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user mr-2"></i>
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!-- <span class="dropdown-item dropdown-header">Settings</span> -->
                        <!-- <div class="dropdown-divider"></div> -->

                        <a href="Profile" class="dropdown-item">
                            <i class="fas fa-portrait mr-2"></i>Profile
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                        <a href="<?php echo e(url('Logout')); ?>" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            <span class="float-right text-muted text-sm"></span>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo e(url('Admin/Dashboard')); ?>" class="brand-link text-center">
                <!-- <img src="<?php echo e(asset('public/dist/img/AdminLTELogo.png')); ?>" class="brand-image img-circle elevation-3"
                    style="opacity: .8"> -->
                <span class="brand-text font-weight-bold">Al Chishty</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="<?php echo e(url('public/img/default.jpg')); ?>" class="img-circle elevation-2" alt="User Image"> -->
                    </div>
                    <div class="info h5">
                        <a href="#" class="d-block"> 
                        <!-- <i class="fas fa-circle" style="color:#06D755;"></i>  -->
                        <?php echo e(Session::get('user_name')); ?> </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
												with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo e(url('Admin/Dashboard')); ?>" 
                            class="nav-link <?php echo e((request()->segment(2) == 'Dashboard') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Admin dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(url('Admin/CompanySite')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'CompanySite') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>Company Site</p>
                            </a>
                        </li>
                        
                        <?php if(request()->segment(2) == 'UOM'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Operation'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Department'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Machine'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Shift'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php else: ?>
                            <li class="nav-item has-treeview main_active ">
                            <a href="#" class="nav-link ">
                        <?php endif; ?>
                            <!-- <a href="#" class="nav-link"> -->
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Setup Master<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('UOM')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'UOM') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-glass-martini-alt"></i>
                                        <p>UOM</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Operation')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Operation') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-tasks"></i>
                                        <p>Operation</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Department')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Department') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-building"></i>
                                        <p>Department</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Machine')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Machine') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-industry"></i>
                                        <p>Machine</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Shift')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Shift') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-hourglass-start"></i>
                                        <p>Working Hours</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if(request()->segment(2) == 'Items-Grades'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Items-Sizes'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Items'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php else: ?>
                            <li class="nav-item has-treeview main_active ">
                            <a href="#" class="nav-link ">
                        <?php endif; ?>
                            <!-- <a href="#" class="nav-link"> -->
                                <i class="nav-icon fas fa-home"></i>
                                <p>Inventory<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Items-Grades')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Items-Grades') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Items Grades</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Items-Sizes')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Items-Sizes') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Item Sizes</p>
                                    </a>
                                </li>
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Items')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Items') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Items</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if(request()->segment(2) == 'EmployeMaster'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php elseif(request()->segment(2) == 'Employee-Shifts'):?>
                            <li class="nav-item menu-open main_active ">
                                <a href="#" class="nav-link active">
                        <?php else: ?>
                            <li class="nav-item has-treeview main_active ">
                            <a href="#" class="nav-link ">
                        <?php endif; ?>
                            <!-- <a href="#" class="nav-link"> -->
                                <i class="nav-icon fas fa-users"></i>
                                <p>Employee Master<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Employe-Master-Show')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'EmployeMaster') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>Employee</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item main_active ">
                                <a href="<?php echo e(route('Employee-Bank-Show')); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>Employee Bank</p>
                                </a>
                                </li>
                                <li class="nav-item main_active ">
                                <a href="<?php echo e(route('Employee-Contact-Detail-Show')); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    <p>Contact</p>
                                </a>
                                </li> -->
                                <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Employee-Shifts')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Employee-Shifts') ? 'active' : ''); ?>">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>Shifts</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item main_active ">
                                    <a href="<?php echo e(route('Employee-Document')); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-address-book"></i>
                                        <p>Documents</p>
                                    </a>
                                </li> -->
                            </ul> 
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(route('Visitor-Log')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Visitor-Log') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>Client Logs</p>
                            </a>
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(route('Client')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Client') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Clients</p>
                            </a>
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(route('Purchase')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Purchase') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Purchase</p>
                            </a>
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(route('Sales-Inquiry')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Sales-Inquiry') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Pre Sales Inquiry</p>
                            </a>
                        </li>
                        <li class="nav-item main_active ">
                            <a href="<?php echo e(route('Sales-Order')); ?>" class="nav-link <?php echo e((request()->segment(2) == 'Sales-Order') ? 'active' : ''); ?>">
                                <i class="nav-icon fas fa-chart-area"></i>
                                <p>Sales Order</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <form id="frm-logout" action="" method="POST" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid p-3">
                    <?php echo $__env->yieldContent('content'); ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.Main content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?=date("Y")?></strong> All rights reserved. Developed By <a
                href="https://dualsysco.com">Dualsysco</a>
        </footer>
    </div>
    <!-- ./wrapper -->
    <script>
    $(document).ready(function() {
        // alert('as');
    });
    </script>
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- jQuery -->

    <!-- Bootstrap 4 -->
    <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>
    <!-- //sweet Alert -->
    <script src="<?php echo e(url('public/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <!-- Sweet Aleert Toast -->
    <script src="<?php echo e(url('public/plugins/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/layout.blade.php ENDPATH**/ ?>