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

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Perfect</b>Recharge</a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new member ship</p>

        <form id="RegisterForm">
          <?php echo csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </form>

        <div class="row">
          <div class="col-5">
            <button onclick="RegisterPost()" class="btn btn-primary text-white btn-block">Register</button>
          </div>
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div id="response">
          </div>
        </div>
        <a href="<?php echo e(url('/')); ?>" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

  <script>
  $(document).ready(function() {

  });

  function RegisterPost() {
    // alert('hello');
    var name = $('#user_name').val();
    var email = $('#user_email').val();
    var password = $('#user_password').val();

    // if (name == "" || email == "" || password == "") {
    //   alert('Please Enter All Fields')
    // }

    // console.log(name+" "+email+" "+password);
    $.ajax({
      type: "post",
      url: "<?php echo e(url('RegisterPost')); ?>",
      data: $('#RegisterForm').serialize(),
      success: function(data) {
        console.log(data);
        $('#response').html(data);
        if (data.includes('success')) {
          window.location.href = "<?php echo e(url('/')); ?>";
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

</html><?php /**PATH C:\xampp\htdocs\LaravelAdminlte3-middleware\resources\views/Authentication/Register.blade.php ENDPATH**/ ?>