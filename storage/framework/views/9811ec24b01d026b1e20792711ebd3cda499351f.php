<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(config('app.name')); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(url('public/dist/css/adminlte.min.css')); ?>">
  <!-- Google Font: Source Sans Pro -->
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo e(url('public/plugins/toastr/toastr.min.css')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <?php 
    if(Session::get('user_id') != ""){
      die("<script>window.location='".url('Admin/Dashboard')."'</script>");
    }
  ?>
  <div class="login-box">
    <div class="login-logo"> <b>Al-Chisty</b> Engineering </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login to start your session</p>
        <form id="loginForm">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-4 m-auto">
            <button class="btn btn-block btn-primary text-white" id="submit">Sign
              In</button>
          </div>
        </div>
        <div class="row">  
          <div class="col-12">
            <div style="margin-top: 15px;" id="response"></div>
            <div id="success" class="alert alert-success text-center" style="display: none;">Login Successfull</div>
          </div> 
        </div>
        <!-- <div class="row">
          <div class="col-12 mt-2">
            <p  style="text-align: center;">New Around Here..?<a href="<?php echo e(url('Register')); ?>">Sign Up</a></p>
          </div> 
        </div> -->
        <div id="response"></div>
      </div>
    </div>
  </div>

  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- //sweet Alert -->
  <script src="<?php echo e(url('public/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
  <!-- Sweet Aleert Toast -->
  <script src="<?php echo e(url('public/plugins/toastr/toastr.min.js')); ?>"></script>     
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  $("#submit").click(function(){

    $("#submit").attr("disabled", true);
    $.ajax({
      type: "post",
      url: "<?php echo e(route('LoginPost')); ?>",
      data: $('#loginForm').serialize(),
      error: function(jqXHR,textStatus,errorThrown){
          Toast.fire({
              type: 'warning',
              title: 'Internal Server Error'
              })
          return false;
        },
      success: function(data) {
        console.log(data);
        $('#response').html(data);
        $("#submit").attr("disabled", false);
 
        if (data.includes("Admin")) 
        {
          toastr.success('Login Successfully...')
          window.location.href = "<?php echo e(url('Admin/Dashboard')); ?>";
        } 
        else if (data.includes("Master")) 
        {
          toastr.success('Login Successfully...')
          window.location.href = "<?php echo e(url('Master/Dashboard')); ?>";
        } 
        else if (data.includes("Distributor")) 
        {
          toastr.success('Login Successfully...')
          window.location.href = "<?php echo e(url('Distributor/Dashboard')); ?>";
        } 
        else if (data.includes("Retailer")) 
        {
          toastr.success('Login Successfully...')
          window.location.href = "<?php echo e(url('Retailer/Dashboard')); ?>";
        } 
      }
    });
  });
  </script>

  <!-- Bootstrap 4 -->
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/Authentication/Login.blade.php ENDPATH**/ ?>