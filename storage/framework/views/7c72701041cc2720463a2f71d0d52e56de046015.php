<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title><?php echo e(config('app.name')); ?></title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('public/dist/css/adminlte.min.css')); ?>">
  <!-- Bootstrap CDN -->

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
</head>

<body class="hold-transition sidebar-mini">
  <?php
		if(Session::get('user_id')==""){
			die("<script>window.location='".url('login')."'</script>");
		}
	?>
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
      <?php if(Session::get('type_id')==1): ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MainWallet">
        Main Wallet
      </button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DMRWallet">
        DMR Wallet
      </button>
      <a href="<?php echo e(url('BalanceTransfer')); ?>" class="btn btn-primary">
        Balance Transfer
      </a>
      <?php endif; ?>
      <?php if(Session::get('type_id') == 2 || Session::get('type_id' ) == 3): ?>
      <a href="<?php echo e(url('BalanceTransfer')); ?>" class="btn btn-primary">
        Balance Transfer
      </a>
      <?php endif; ?>
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
            <?php echo e(Session::get('user_name')); ?>

            <i class="fas fa-angle-down"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <!-- <span class="dropdown-item dropdown-header">Settings</span> -->
            <!-- <div class="dropdown-divider"></div> -->
            <?php if(Session::get('type_id')==1): ?>
            <a href="<?php echo e(url('Profile')); ?>" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Profile
              <span class="float-right text-muted text-sm"></span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo e(url('OwnerAccountSummery')); ?>" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Account
              <span class="float-right text-muted text-sm"></span>
            </a>
            <div class="dropdown-divider"></div>
            <?php endif; ?>
            <a href="<?php echo e(url('logout')); ?>" class="dropdown-item">
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
      <a href="<?php echo e(url('Dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('public/dist/img/AdminLTELogo.png')); ?>" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Perfect Recharge</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <!-- <img src="<?php echo e(url('public/img/default.jpg')); ?>" class="img-circle elevation-2" alt="User Image"> -->
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo e(Session::get('member_type')); ?> Panel</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
												with font-awesome or any other icon font library -->
            <li class="nav-item main_active ">
              <a href="<?php echo e(url('Dashboard')); ?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            <?php if(Session::get('type_id')==1): ?>
            <li class="nav-item has-treeview main_active ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Member Management<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('CreateMember')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Member</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo e(url('AllMembersReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Member Report</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('MasterDistributor')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Distributor</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Distributor')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Distributor </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Retailer')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Api')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>API</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(Session::get('type_id')==2): ?>
            <li class="nav-item has-treeview main_active ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Member Management<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('CreateMember')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Member</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Distributor')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Distributor </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Retailer')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>

            <?php if(Session::get('type_id')==3): ?>
            <li class="nav-item has-treeview main_active ">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Member Management<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('CreateMember')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create Member</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('Retailer')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <!-- Transaction Management Role Base View -->
            <?php if(Session::get('type_id')==1): ?>
            <li class="nav-item has-treeview main_active">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rupee-sign"></i>
                <p>
                  Transactions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('MasterTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Master Transaction</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('DistributorTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Distributor Transaction</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('RetailerTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer Transaction</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>API Transaction</p>
                  </a>
                </li>
                <li class="nav-item" style="display:none;">
                  <a href="<?php echo e(url('AllTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Transactions</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(Session::get('type_id')==2): ?>
            <li class="nav-item has-treeview main_active">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rupee-sign"></i>
                <p>
                  Transactions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('Master/'.Session::get('user_id').'/Transactions')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Account Summery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('DistributorTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Distributor Transaction</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('RetailerTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer Transaction</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(Session::get('type_id')==3): ?>
            <li class="nav-item has-treeview main_active">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-rupee-sign"></i>
                <p>
                  Transactions
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('Distributor/'.Session::get('user_id').'/Transactions')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Account Summery</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('RetailerTransactionReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Retailer Transaction</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <?php if(Session::get('type_id')==4): ?>
            <li class="nav-item">
              <a href="<?php echo e(url('Retailer/'.Session::get('user_id').'/Transactions')); ?>" class="nav-link">
								<i class="fas fa-list-alt"></i>
                <p> Account Summery</p>
              </a>
            </li>
            <?php endif; ?>

            <?php if(Session::get('type_id')==1): ?>
            <li class="nav-item has-treeview main_active">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fas fa-user"></i> -->
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  API Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('CreateAPI')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create API</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('CreateAPIAttribute')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create API Attributes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('API')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>API Report</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('APIAttributeReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>API Attribute Report</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php endif; ?>
            <li class="nav-item has-treeview main_active">
              <a href="#" class="nav-link">
                <!-- <i class="nav-icon fas fa-user"></i> -->
                <i class="nav-icon fas fa-mobile-alt"></i>
                <p>
                  Recharge Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo e(url('Recharge')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recharge</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recharge Succes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('RechargeReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recharge Pending</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('RechargeReport')); ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recharge Failed</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item">
              <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mess</p>
              </a>
            </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <form id="frm-logout" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
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
          <!-- row -->
          <!-- Modal -->
          <div class="modal fade" id="MainWallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Enter Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="MainWalletForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col">
                        <input type="hidden" id="sender_id" name="sender_id" value="<?php echo e(Session::get('user_id')); ?>">
                        <input type="hidden" id="voucher_type" name="voucher_type" value="main">
                        <input type="text" id="main_wallet" name="main_wallet" class="form-control"
                          placeholder="Main Wallet">
                      </div>
                    </div>
                  </form>
                </div>
                <div id="response"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="OwnerMainAmount()" class="btn btn-primary">Generate</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="DMRWallet" tabindex="-1" role="dialog" aria-labelledby="DMRWalletLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="DMRWalletLabel">Enter Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="DMRWalletForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                      <div class="col">
                        <input type="hidden" id="sender_id" name="sender_id" value="<?php echo e(Session::get('user_id')); ?>">
                        <input type="hidden" id="voucher_type" name="voucher_type" value="dmr">
                        <input type="text" id="wallet_amount" name="wallet_amount" class="form-control"
                          placeholder="DMR Wallet">
                      </div>
                    </div>
                  </form>
                </div>
                <div id="response"></div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button onclick="OwnerDMRAmount()" class="btn btn-primary">Generate</button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
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
      <strong>Copyright &copy; <?=date("Y")?> PerfectRecharge.</strong> All rights reserved. Developed By <a
        href="https://dualsysco.com">Dualsysco</a>
    </footer>
  </div>
  <!-- ./wrapper -->
  <script>
  $(document).ready(function() {
    // alert('as');
  });

  function OwnerMainAmount() {
    var Amount = $('#main_wallet').val();
    $.ajax({
      type: "post",
      url: "<?php echo e(url('OwnerMainAmount')); ?>",
      data: $('#MainWalletForm').serialize(),
      success: function(data) {
        console.log(data);
        // $('#response').html(data);
        if (data.includes('Amount Added Succesfully')) {
          location.reload();
        }
      }
    });
  }

  function OwnerDMRAmount() {
    var Amount = $('#wallet_amount').val();
    $.ajax({
      type: "post",
      url: "<?php echo e(url('OwnerDMRAmount')); ?>",
      data: $('#DMRWalletForm').serialize(),
      success: function(data) {
        console.log(data);
        // $('#response').html(data);
        if (data.includes('DMR Amount Added Succesfully')) {
          location.reload();
        }
      }
    });
  }
  </script>
  <!-- datatable -->
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <!-- jQuery -->

  <!-- Bootstrap 4 -->
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\PerfectRecharge\resources\views/layout.blade.php ENDPATH**/ ?>