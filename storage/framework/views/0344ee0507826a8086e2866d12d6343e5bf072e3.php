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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <?php if(Session::get('user_id') != ""): ?>

    <?php if(Session::get('user_type') == 1): ?>
    <script>
    window.location.href = "<?php echo e(route('Admin.Dashboard')); ?>";
    </script>
    <?php else: ?> if(Session::get('user_type') == 2)
    <script>
    window.location.href = "<?php echo e(route('Master.Dashboard')); ?>";
    </script>
    <?php endif; ?>

  <?php endif; ?>
  <div class="login-box">
    <div class="login-logo"> <b>Admin</b>Login </div>
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
          <div class="col-6">
            <button class="btn btn-block btn-primary text-white" onclick="LoginPost(event)" id="LoginPost">Sign
              In</button>
          </div>
          <div class="col-6">
            <div class="icheck-primary">
              <a href="<?php echo e(url('Register')); ?>">
                New Registeration
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <a class="btn btn-danger" href="<?php echo e(url('Logout')); ?>">Logout</a>
          </div>
        </div>
        <div id="response"></div>
      </div>
    </div>
  </div>

  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

  <script>
  function LoginPost(event) {
    event.preventDefault();
    var x = event.cancelable;
    var email = $('#user_email').val();
    var password = $('#user_password').val();
    // console.log(email+" "+password);
    $.ajax({
      type: "post",
      url: "<?php echo e(route('LoginPost')); ?>",
      data: $('#loginForm').serialize(),
      success: function(data) {
        console.log(data);
        var str = data.substring(0, data.search(" ") - 1);
        // $('#response').html(data);
        // console.log("# "+str+"#");
        // return false;
        if (data.includes("Admin")) {
          window.location.href = "<?php echo e(url('Admin/Dashboard')); ?>";
        } else if (data.includes("Master")) {
          window.location.href = "<?php echo e(url('Master/Dashboard')); ?>";
        } else if (data.includes("Distributor")) {
          window.location.href = "<?php echo e(url('Distributor/Dashboard')); ?>";
        } else if (data.includes("Retailer")) {
          window.location.href = "<?php echo e(url('Retailer/Dashboard')); ?>";
        } else {
          window.location.href = "<?php echo e(url('Login')); ?>";
        }
      }
    });
  }
  </script>

  <!-- Bootstrap 4 -->
  <script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\set_admin_templates\LaravelAdminlte3-middleware\resources\views/Authentication/Login.blade.php ENDPATH**/ ?>