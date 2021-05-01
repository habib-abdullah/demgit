<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
          <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow" style="border-left: 2px solid #007BFF;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Employee</div>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo e(route('Employee-Create')); ?>"><button type="button" class="btn btn-primary">Add</button></a>
                  </div>
                </div>
              </div>
            </div>
        </div> 
    </div>
  </div>       
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/EmployeeMaster/EmployeeShow.blade.php ENDPATH**/ ?>