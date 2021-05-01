<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Master</div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(route('Designation-Create')); ?>"><button type="button" class="btn btn-primary"
                  data-toggle="modal" data-target="#myModal">Designation</button></a>
              <a href="<?php echo e(route('Employee-Create')); ?>"><button type="button" class="btn btn-primary">Add
                  Employee</button></a>
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
              <th>Profile</th>
              <th>Emp Code</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Designation</th>
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
    "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
    processing: true,
    serverSide: true,
    ajax: "<?php echo e(route('Employee-Report')); ?>",
    columns: [
      {
        data: 'emp_profile_img',
        render: function(data) {
          if (data != null) {
            return '<img src="<?php echo e(url("public/crop_image/")); ?>/' + data + '" style="width:70px;height:auto;">';
          } else {
            return '<img src="<?php echo e(url("public/crop_image/default.jpg")); ?>" style="width:70px;height:auto;">';
          }
        },
        'searchable': false,
        'orderable': false,
        'className': 'text-center',
      },
      {
        data: 'employee_code',
        'searchable': false,
        'orderable': false,
        'className': 'text-center',
      },
      {
        data: 'Name',
        'searchable': true,
        'orderable': true,
        'className': 'text-center',
      },
      {
        data: 'contact',
        'searchable': true,
        'orderable': false,
        'className': 'text-center',
      },
      {
        data: 'designation',
        'searchable': true,
        'orderable': false,
        'className': 'text-center',
      },
      {
        data: 'action',
        'searchable': false,
        'orderable': false,
        'className': 'text-center',
      }
    ]
  });
});

function EmployeeRemove(id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover record file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("<?php echo e(route('Employee-Remove')); ?>", {
        id: id
      }, function(data) {
        console.log(data);
        if (data.includes("User Remove successfully")) {
          swal("Poof! Employee Detail has been deleted!", {
            icon: "success",
          });
          //toastr.success('Employee Bank Detail Removed Successfully..')
          tables = $("#DataTable").dataTable();
          tables.fnPageChange('first', 1);
        }
      });
    } else {
      swal("Your record is safe!");
    }
  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/EmployeeMaster/Employee.blade.php ENDPATH**/ ?>