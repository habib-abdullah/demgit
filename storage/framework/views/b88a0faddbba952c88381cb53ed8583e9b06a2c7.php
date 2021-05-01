<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
          <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow" style="border-left: 2px solid #007BFF; ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Contact Detail</div>
                    </div>
                    <div class="col-auto">
                      <a href="<?php echo e(route('Employe-Contact-Detail-Create')); ?>">
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        		data-target="#myModal">Add
                        </button>
                      </a>  
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
              <h6 class="m-0 font-weight-bold text-primary">Employee Contact Detail</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>WhatsApp</th>
                      <th>Imo</th>
                      <th>Facebook</th>
                      <!-- <th>Contact Name</th> -->
                      <!-- <th>Contact no</th> -->
                      <!-- <th>Contact Rel</th> -->
                      <!-- <th>UAE Contact Name</th> -->
                      <!-- <th>UAE Contact no</th> -->
                      <!-- <th>UAE Contact Rel</th> -->
                      <th>UAE Address</th>
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
    $(function(){
        var tables = $("#DataTable").DataTable({
            processing : true,
            serverSide : true,
            ajax : "<?php echo e(route('Employee-Contact-Report')); ?>",
            columns :
            [
                {data : 'emp_contact_detail_id'},
                {data : 'Name'},
                {data : 'emp_email'},
                {data : 'emp_contact_no'},
                {data : 'emp_whatsapp_no'},
                {data : 'emp_imo_no'},
                {data : 'emp_facebook_id'},
                // {data : 'emp_permanent_contact_name'},
                // {data : 'emp_permanent_contact_no'},
                // {data : 'emp_permanent_contact_relation'},
                // {data : 'emp_uae_emerge_contact_no'},
                // {data : 'emp_uae_emerge_contact_name'},
                // {data : 'emp_uae_contact_relation'},
                {data : 'emp_uae_permanent_address'},
                {data : 'action'}
            ]
            });
        
    });

    function EmployeeContactRemove(id)
    { 
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })

      .then((willDelete) => {
        if (willDelete) 
        {
          $.get("<?php echo e(route('Employee-Contact-Remove')); ?>",{id:id},function(data){
            console.log(data);
            if(data.includes("User Remove successfully"))
            {
              swal("Poof! Bank Detail has been deleted!", 
              {
                  icon: "success",
              });
              //toastr.success('Employee Bank Detail Removed Successfully..')
                tables = $("#DataTable").dataTable();
                tables.fnPageChange('first',1);
            }
        });
        } 
        else 
        {
            swal("Your file is safe!");
        }
});
}
    
  </script> 
  
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeMaster/EmployeeContactShow.blade.php ENDPATH**/ ?>