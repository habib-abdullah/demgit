<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow" style="border-left: 2px solid #007BFF; ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Bank Detail</div>
            </div>
            <div class="col-auto">
              <a href="<?php echo e(route('Employee-Bank-Create')); ?>"><button type="button" class="btn btn-primary">Add</button></a>
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
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Employee Bank Detail</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>EID</th>
              <th>Name</th>
              <th>Bank</th>
              <th>Branch</th>
              <th>AccountNo</th>
              <th>AccountType</th>
              <th>IBAN</th>
              <th>IFSC</th>
              <th>Passbook</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

</div>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(function() {
  var tables = $("#DataTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: "<?php echo e(route('Bank-Report')); ?>",
    columns: [{
        data: 'emp_bank_id'
      },
      {
        data: 'Name'
      },
      {
        data: 'bank_name'
      },
      {
        data: 'branch_name'
      },
      {
        data: 'account_number'
      },
      {
        data: 'account_type'
      },
      {
        data: 'iban'
      },
      {
        data: 'ifsc_code'
      },
      {
        data: 'bank_passbook_image',
        render: function(data) {
          // return '<img src="http://localhost/firstproject/public/Product/images/'+data+'" styl="width:30px;height:auto;">';
          return '<img src="<?php echo e(url("public/Employee/Bank_Pasbook_Images")); ?>/' + data +
            '" style="width:70px;height:auto;">';
        }

      },
      {
        data: 'action'
      }
    ]
  });

});

function EmployeeBankRemove(id) {
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })

    .then((willDelete) => {
      if (willDelete) {
        $.get("<?php echo e(route('Employee-Bank-Remove')); ?>", {
          id: id
        }, function(data) {
          console.log(data);
          if (data.includes("User Remove successfully")) {
            swal("Poof! Bank Detail has been deleted!", {
              icon: "success",
            });
            //toastr.success('Employee Bank Detail Removed Successfully..')
            tables = $("#DataTable").dataTable();
            tables.fnPageChange('first', 1);
          }
        });
      } else {
        swal("Your file is safe!");
      }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeBank/Bank.blade.php ENDPATH**/ ?>