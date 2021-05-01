<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Clients & Vendors</div>
            </div>
            <div class="col-auto">
              <!-- <a href="<?php echo e(route('Employee-Document-Category')); ?>" class="btn btn-primary">Category</a> -->
              <!-- <a href="#" class="btn btn-primary">Add Documents</a> -->
              <a href="<?php echo e(route('Client-Create')); ?>" class="btn btn-primary">Add Client</a>
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
              <th>UID</th>
              <th>Client Name</th>
              <th>Client Company</th>
              <th>Code</th>
              <th>Company Mobile</th>
              <th>Type</th>
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
var tables = '';
$(function() {

  var tables = $("#DataTable").DataTable({
    "autoWidth": true,
    "responsive": true,
    dom: 'lBfrtip',
    buttons: [
      // 'excel', 'print'
      // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
      {
        "extend": 'excel',
        "text": 'Export',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      },
      {
        "extend": 'print',
        "text": 'Print',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      }
    ],
    processing: true,
    serverSide: true,
    ajax: "<?php echo e(route('Client-Show')); ?>",
    columns: [{
        data: 'client_id',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'clientName',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'company_name',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'client_code',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'company_mobile',
        'searchable':false,
        'orderable':true,
        'class':'text-center'
      },
      {
        data: 'client_type',
        'searchable':false,
        'orderable':true,
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

function ClientRemove(client_id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.get("<?php echo e(route('Client-Remove')); ?>", {
        client_id: client_id
      }, function(data) {
        console.log(data);
        if (data['success'] == true) {
          swal("Poof! Client has been removed successfuly...", {
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Client/Client.blade.php ENDPATH**/ ?>