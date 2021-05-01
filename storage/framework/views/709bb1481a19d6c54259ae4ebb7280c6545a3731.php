<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
          <!-- Page Heading -->
      <div class="row">
            <div class="col-lg-12 mb-2">
              <div class="card shadow" style="border-left: 2px solid #007BFF; ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Visitor</div>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-toggle="modal" 
                        		data-target="#myModal">Add</button>
                            <div class="modal fade" id="myModal">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-primary">
      
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Add Visitor</h4>
                              </div>
        
                              <!-- Modal body -->
                              
                              <div class="modal-body">
                                <form id="VisitorType">
                                  <?php echo csrf_field(); ?>
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user border-primary" name="visitor_name" id="visitor_name" autocomplete="off">
                                  <span name="visitor_name_error" id="visitor_name_error"></span>
                                </div>
                          
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <span id="visitor_error_area" style="display: none;"class="m-auto"></span>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="Visitor_submit" class="btn btn-primary">Submit</button>
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
              <h6 class="m-0 font-weight-bold text-primary">Visitor List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>VID</th>
                      <th>Visitor Name</th>
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
              <h4 class="modal-title">Update Visitor</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        
                              <!-- Modal body -->
            <div class="modal-body" id="VisitorUpdate">

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
            ajax : "<?php echo e(route('Visitor-Report')); ?>",
            columns :
            [
                {data : 'type_id'},
                {data : 'type_name'},
                {data : 'action'}
            ]
            });
    });

    $('#Visitor_submit').click(function()
      {
          var visitor_name_err = true;

          var Vname_val = $('#visitor_name').val();
          if(Vname_val.length == '')
          {
            $('#visitor_name_error').show();
            $('#visitor_name_error').html("**Please Fill the name");
            $('#visitor_name_error').focus();
            $('#visitor_name_error').css("color","red");
            visitor_name_err = false;
            return false;
          }
          else
          {
            $('#visitor_name_error').hide();
          }
          
          
          $.ajax({

              type : "POST",
              url : "<?php echo e(route('Visitor-type-Store')); ?>",
              data : $("#VisitorType").serialize(),
              success : function(data){
                console.log(data);
                if(data['success'] == false)
                {
                    $("#visitor_error_area").show();
                    $("#visitor_error_area").addClass("alert alert-danger").html(data['message']).css({
                      "color": "#fff"});
                }
                if(data["success"] == true)
                {

                    $("#visitor_error_area").show();
                    $("#visitor_error_area").html(data['message']);
                    $("#visitor_error_area").addClass("alert alert-success").html(data['message']);

                    setTimeout(function(){ $("#myModal").modal('hide') }, 3000);
                    let tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first',1);

                    location.reload()

                }
              }
            });
      });
      function VisitorEdit(id)
      {
         $.get("<?php echo e(url('Admin/VisitorEdit')); ?>",{id:id},function(data){
            console.log(data);
            $('#VisitorUpdate').html(data);
          });
      }

      $('#update').click(function()
      {
          var Vname_err = true;

          var Vname_val = $('#Visitor_name').val();
          if(Vname_val.length == '')
          {
            $('#Visitor_name_err').show();
            $('#Visitor_name_err').html("**Please Fill the name");
            $('#Visitor_name_err').focus();
            $('#Visitor_name_err').css("color","red");
            Dname_err = false;
            return false;
          }
          else
          {
            $('#Visitor_name_err').hide();
          }
          
          
          $.ajax({
              type : "POST",
              url : "<?php echo e(route('Visitor-Update')); ?>",
              data : $(".VisitorForm").serialize(),
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/Visitor/visitor.blade.php ENDPATH**/ ?>