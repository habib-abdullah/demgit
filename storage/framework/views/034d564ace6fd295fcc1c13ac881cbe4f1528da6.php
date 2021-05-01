<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">PreSales Inquiry</div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(url('PreSalesOrderStore')); ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#SalesOrderStoreModal">Add
                Inquiry</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="table-responsive">
              <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Focus SO#</th>
                    <th>Subject</th>
                    <th>Customer</th>
                    <th>Booked By</th>
                    <th>Delivery Date</th>
                    <th>Current Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/PreSalesOrder/PreSalesOrder.blade.php ENDPATH**/ ?>