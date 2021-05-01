<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
          <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow" style="border-left: 2px solid #007BFF; ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Designation</div>
                    </div>
                    <div class="col-auto">
                      <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 22px;"><i class="fas fa-arrow-circle-left"></i></a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        		data-target="#myModal">Add</button>
                            <div class="modal fade" id="myModal">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-primary">
      
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Add Designation</h4>
                              </div>
        
                              <!-- Modal body -->
                              
                              <div class="modal-body">
                                <form id="DesignationStore">
                                  <?php echo csrf_field(); ?>
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user border-primary" name="Designation" id="Designation" autocomplete="off">
                                  <span name="error_form" id="name_err"></span>
                                </div>
                          
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <span id="error_area" style="display: none;"class="m-auto"></span>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="submit" class="btn btn-primary">Submit</button>
                              </div>
                               </form>
                              </div>
                               
                            </div>
                          </div>
                        </div>
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
              <h6 class="m-0 font-weight-bold text-primary">Designation List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>EID</th>
                      <th>Designation Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

    </div> 
    <div class="modal fade" id="desigModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-primary">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Designation role</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
                              <!-- Modal body -->
            <div class="modal-body" id="DesignationUpdate">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
               <span id="update_error_area"class="m-auto"></span>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" id="update" class="btn btn-primary">Update</button>
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
            ajax : "<?php echo e(route('Designation-Report')); ?>",
            columns :
            [
                {data : 'eid'},
                {data : 'Employe_Desig_Name'},
                {data : 'action'}
            ]
            });
    });
    $('#submit').click(function()
      {
        var Dname_err = true;

          var name_val = $('#Designation').val();
          if(name_val.length == '')
          {
            $('#name_err').show();
            $('#name_err').html("**Please Fill the name");
            $('#name_err').focus();
            $('#name_err').css("color","red");
            Dname_err = false;
            return false;
          }
          else
          {
            $('#name_err').hide();
          }
        $.ajax({

              type : "POST",
              url : "<?php echo e(route('Designation-Store')); ?>",
              data : $("#DesignationStore").serialize(),
              success : function(data){
                console.log(data);
                if(data['success'] == false)
                {
                    $("#error_area").show();
                    $("#error_area").addClass("alert alert-danger").html(data['message']).css({
                      "color": "#fff"});
                }
                if(data["success"] == true)
                {

                    $("#error_area").show();
                    $("#error_area").html(data['message']);
                    $("#error_area").addClass("alert alert-success").html(data['message']);
                //     swal({
                //   title: "Good job!",
                //   text: "Designation Stored Successfully...",
                //   icon: "success",
                // });
                //swal('Designation Stored Successfully...');
                //toastr.success('Designation Stored Successfully...')
                    setTimeout(function(){ $("#myModal").modal('hide') }, 3000);
                    let tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first',1);

                    location.reload()

                }
              }
            });
      });
    function DesignationRemove(id)
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
            $.get("<?php echo e(route('Designation-Remove')); ?>",{id:id},function(data){
            console.log(data);
              if(data.includes("User Remove successfully"))
              {
                swal("Poof! Designation has been deleted!", 
                {
                  icon: "success",
                });
                //window.location.href="<?php echo e(url('UsersShow')); ?>";
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


    function DesignationEdit(id)
    {
      $.get("<?php echo e(url('Admin/DesignationEdit')); ?>",{id:id},function(data){
            console.log(data);
            $('#DesignationUpdate').html(data);
    });
    }

    $('#update').click(function()
      {
          var Dname_err = true;

          var name_val = $('#Designation_name').val();
          if(name_val.length == '')
          {
            $('#Designation_name_err').show();
            $('#Designation_name_err').html("**Please Fill the name");
            $('#Designation_name_err').focus();
            $('#Designation_name_err').css("color","red");
            Dname_err = false;
            return false;
          }
          else
          {
            $('#Designation_name_err').hide();
          }
          
          
          $.ajax({
              type : "POST",
              url : "<?php echo e(route('Designation-Update')); ?>",
              data : $(".DesigForm").serialize(),
              success : function(data){
                console.log(data);
                if(data['success'] == false)
                {
                    $("#update_error_area").show();
                    $("#update_error_area").addClass("alert alert-danger").html(data['message']).css({
                      "color": "#fff"});
                }
                if(data["success"] == true)
                {

                    $("#update_error_area").show();
                    $("#update_error_area").html(data['message']);
                    $("#update_error_area").addClass("alert alert-success").html(data['message']);

                    setTimeout(function(){ $("#myModal").modal('hide') }, 3000);
                    let tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first',1);

                    location.reload()

                }
              }
            });
      });
        
  </script>      
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/EmployeeMaster/Designation.blade.php ENDPATH**/ ?>