<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
          <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow" style="border-left: 2px solid #007BFF;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Employee Master</div>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo e(route('Designation-Create')); ?>"><button type="button" class="btn btn-primary" data-toggle="modal" 
                        		data-target="#myModal">Designation</button></a>
                        <a href="<?php echo e(route('Employee-Create')); ?>"><button type="button" class="btn btn-primary">Employee</button></a>
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
              <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>EID</th>
                      <th>Designation</th>
                      <th>Name</th>
                      <th>Profile</th>
                      <th>DOB</th>
                      <th>Nationality</th>
                      <th>MaritalStatus</th>
                      <th>Visa Issued</th>
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
    $(function(){
        var tables = $("#DataTable").DataTable({
            processing : true,
            serverSide : true,
            ajax : "<?php echo e(route('Employee-Report')); ?>",
            columns :
            [
                {data : 'employee_id'},
                {data : 'designation'},
                {data : 'Name'},
                {data : 'emp_profile_img',
                        render:function(data)
                        {
                            return '<img src="<?php echo e(url("public/crop_image")); ?>/'+data+'" style="width:70px;height:auto;">';
                        }
                },
                {data : 'birth_date'},
                {data : 'nationality'},
                {data : 'marital_status'},
                {data : 'visa_Issued_from'},
                {data : 'action'}
            ]
            });
    });
    function EmployeeRemove(id)
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
          $.get("<?php echo e(route('Employee-Remove')); ?>",{id:id},function(data){
            console.log(data);
            if(data.includes("User Remove successfully"))
            {
              swal("Poof! Employee Detail has been deleted!", 
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/EmployeeMaster/Employee.blade.php ENDPATH**/ ?>