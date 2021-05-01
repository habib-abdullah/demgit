<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
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
<div class="login-box">
  <div class="login-logo">
    <b>Perfect</b>Recharge</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="loginForm" >
		  <?php echo csrf_field(); ?>
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
        <div class="row">
          <div  class="col-8">
		  <div class="icheck-primary">
              
            <a href="<?php echo e(url('Register')); ?>">
               New Registeration
			</a>
		  </div>
		</div>
          <!-- /.col -->
          <div class="col-4">
            <a  class="btn btn-block btn-primary text-white" onclick="loginUser()" >Sign In</a>
		  </div>
		  
          <!-- /.col -->
        </div>
      </form>
      <div id="response">
		</div>
      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>



<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script>

	$(document).ready(function(){
     
	});

	function loginUser(){
		var email = $('#user_email').val();
		var password = $('#user_password').val();

		// console.log(email+" "+password);
		$.ajax({
			type:"post",
			url:"<?php echo e(url('loginUser')); ?>",
			data:$('#loginForm').serialize(),
			success:function(data){
				console.log(data);
				$('#response').html(data);
			}
			
		});

	}

</script>

<!-- Bootstrap 4 -->
<script src="<?php echo e(url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('public/dist/js/adminlte.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\PerfectRecharge1\resources\views/Authentication/login.blade.php ENDPATH**/ ?>