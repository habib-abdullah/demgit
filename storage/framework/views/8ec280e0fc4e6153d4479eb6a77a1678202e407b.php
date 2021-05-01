<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Document</div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(route('Employee-Document-Category')); ?>" class="btn btn-primary">Category</a>
              <!-- <a href="#" class="btn btn-primary">Add Documents</a> -->
              <a href="<?php echo e(route('Employee-Document-Create')); ?>" class="btn btn-primary">Add Documents</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>EID</th>
              <th>Designation</th>
              <th>Name</th>
              <th>Profile</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script type="text/javascript">
$(function() {
  var tables = $("#DataTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "<?php echo e(route('Employee-List')); ?>",
    columns: [{
        data: 'employee_id',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'designation',
        'searchable':true,
        'orderable':false,
        'class':'text-center'
      },
      {
        data: 'Name',
        'searchable':true,
        'orderable':true,
        
      },
      {
        data: 'emp_profile_img',
        render: function(data) {
          return '<img src="<?php echo e(url("public/crop_image")); ?>/' + data +
            '" style="width:70px;height:auto;">';
        },
        'searchable':false,
        'orderable':false,
        'class':'text-center'
      },
     
      {
        data: 'action',
        'searchable':false,
        'orderable':false,
        'class':'text-center'
      }
    ]
  });
});


function testBtn(){
	alert("This section is under construction");
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/EmployeeMaster/Document.blade.php ENDPATH**/ ?>