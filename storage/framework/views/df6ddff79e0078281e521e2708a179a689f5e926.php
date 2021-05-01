<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow" style="border-left: 2px solid #007BFF;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

                Documents</div>
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
  <div style="border-left: 2px solid #007BFF;" class="card shadow mb-4">
    <!-- <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
    </div> -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>UID</th>
              <th>Doc Type</th>
              <th>Name</th>
              <th>File</th>
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
    "ajax": {
      "url": "<?php echo e(route('Employee-Documents-Show')); ?>",
      "data": {
        "employee_id": <?php echo $employee->employee_id; ?>
      }
    },
    columns: [{
        data: 'document_id',
        'searchable': false,
        'orderable': true,
        'class': 'text-center'
      },
      {
        data: 'document_category',
        'searchable': true,
        'orderable': false,
        'class': 'text-center'
      },
      {
        data: 'document_name',
        'searchable': true,
        'orderable': true,
        'class': 'text-center'
      },
      {
        data: 'documents',
        'searchable': true,
        'orderable': true,
        'class': 'text-center'
      },
      // {
      //   data: 'attachment',
      //   render: function(data) {
      //     return '<img src="<?php echo e(url("public/Employee")); ?>/' + data +
      //       '" style="width:70px;height:auto;">';
      //   },
      //   'searchable': false,
      //   'orderable': false,
      //   'class': 'text-center'
      // },
      {
        data: 'action',
        'searchable': false,
        'orderable': false,
        'class': 'text-center'
      }
    ]
  });
});

function DocumentRemove(document_id) {
  // alert(document_id);
  // return false;
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("<?php echo e(route('Employee-Document-Remove')); ?>", {
        document_id: document_id
      }, function(data) {
        console.log(data);
        if (data['success'] == true) {
          swal("Poof! Document Detail has been deleted!", {
            icon: "success",
          });
          //toastr.success('Document Bank Detail Removed Successfully..')
          tables = $("#DataTable").dataTable();
          tables.fnPageChange('first', 1);
        }else{
          swal("Oops something went wrong, please check!", {
            icon: "error",
          });
        }
      });
    } else {
      swal("Your file is safe!");
    }
  });
}

function testBtn() {
  alert("This section is under construction");
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/EmployeeMaster/EmployeeDocumentsList.blade.php ENDPATH**/ ?>