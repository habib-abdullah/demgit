<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  
  <title><?php echo e(config('app.name')); ?></title>
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo e(url('public/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('public/bower_components/admin-lte/dist/css/adminlte.min.css')); ?>">
  <!-- Bootstrap CDN -->
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <script src="<?php echo e(url('public/bower_components/admin-lte/plugins/jquery/jquery.min.js')); ?>"></script>

	

  
</head>
<body class="hold-transition sidebar-mini">
<?php
if(Session::get('user_id')==""){
   die("<script>window.location='".url('login')."'</script>");
  
}
// else{
//   die("<script>window.location='".url('dashboard')."'</script>");
  

// }
?>
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-light navbar">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

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
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Profile
            <span class="float-right text-muted text-sm"></span>
          </a>
          
          <div class="dropdown-divider"></div>
          <a href="<?php echo e(url('logout')); ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            <span class="float-right text-muted text-sm"></span>
          </a>
         
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
      <img src="<?php echo e(asset('public/dist/img/AdminLTELogo.png')); ?>"  class="brand-image img-circle elevation-3"
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
		  <a href="#" class="d-block">Perfect Admin</a>
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
			  <p>
				Home
			  </p>
			</a>
		  </li>
		  
		  

		  <li class="nav-item has-treeview main_active ">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-user"></i>
			  <p>
			  Member Management
				<i class="fas fa-angle-left right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="<?php echo e(url('CreateMember')); ?>" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Create Member</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('AdmissionReport')); ?>" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Admission Report</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('CadidateIdCardList')); ?>"  class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				  <p>ID Card List</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('CandidateDocumentUpload')); ?>"  class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				  <p>Candidate Documents</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('KRC')); ?>"  class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				  <p>KRC</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <li class="nav-item has-treeview main_active">
			<a href="#" class="nav-link">
			  <!-- <i class="nav-icon fas fa-user"></i> -->
			  <i class="nav-icon fas fa-book"></i>
			  <p>
				Library
				<i class="fas fa-angle-left right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="<?php echo e(url('Library/BooksReport')); ?>" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Books</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('Library/Inventory')); ?>" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Inventory</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('Library/E_Library')); ?>" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>E-Library</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="<?php echo e(url('Library/BookBorrow')); ?>"  class="nav-link">
				<i class="far fa-circle nav-icon"></i>
				  <p>Books Transaction</p>
				</a>
			  </li>
			  
			  
			</ul>
		  </li>
		 
		  <li class="nav-item">
			<a href="<?php echo e(url('Mess/MessReport')); ?>"  class="nav-link">
			<i class="far fa-circle nav-icon"></i>
			  <p>Mess</p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="<?php echo e(url('Notification')); ?>"  class="nav-link">
			<i class="far fa-circle nav-icon"></i>
			  <p>Notification</p>
			</a>
		  </li>
		  <li class="nav-item">
			<a href="<?php echo e(url('Test')); ?>"  class="nav-link">
			<i class="far fa-circle nav-icon"></i>
			  <p>Test</p>
			</a>
		  </li>
		  
		  <li class="nav-item">
			<a href="<?php echo e(url('logout')); ?>"  class="nav-link">
			  <i class="nav-icon fas fa-sign-out-alt"></i>
			  <p>Logout</p>
			</a>
		  </li>

		  
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
	  <div class="container-fluid">
		<?php echo $__env->yieldContent('content'); ?>
		<!-- /.row -->
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
	<strong>Copyright &copy; <?=date("Y")?> HCOI IAS.</strong> All rights reserved. Developed By <a href="https://dualsysco.com">Dualsysco</a>
  </footer>
</div>
<!-- ./wrapper -->

<!-- datatable -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- jQuery -->

<!-- Bootstrap 4 -->
<script src="<?php echo e(url('public/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('public/bower_components/admin-lte/dist/js/adminlte.min.js')); ?>"></script>



</body>
</html><?php /**PATH C:\xampp\htdocs\PerfectRecharge1\resources\views/layout.blade.php ENDPATH**/ ?>