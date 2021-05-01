<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">


        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome Dashboard!</h3>
              <div class="card">
                  <div class="card-body">
                    Welcome <?php echo e(ucfirst(Auth()->user()->name)); ?>

                  </div>
                  <div class="card-body">
                    <a class="small" href="<?php echo e(url('logout')); ?>">Logout</a>
                  </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Dashboard.blade.php ENDPATH**/ ?>