<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(url('Croppie/croppie.css')); ?>" />
<section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i></a> 
                  Edit Employee Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="EmployeeDetailEdit">
                <?php echo csrf_field(); ?>
                <?php if(count($row) > 0): ?>
                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="form-control" id="emp_id"name="emp_id" value="<?php echo e($rows->employee_id); ?>">
                <div class="form-row justify-content-center mt-3">
                  <div class="form-group col-md-4 mt-3">
                      <div id="image-preview" class="mt-3"></div>
                  </div>                
                </div>
                <div class="form-row justify-content-center ml-5">
                  <div class="form-group col-md-4">
                      <input type="file" name="upload_image" id="upload_image" accept="image/x-png,image/jpeg"/>
                        <div class="profile_img_err_msg"></div>
                  </div>                
                </div> 
                <hr>
                <div class="form-row justify-content-center mt-3">
                  <div class="form-group col-md-2 mt-3">
                      <img src="<?php echo e(url('/')); ?>/public/crop_image/<?php echo e($rows->emp_profile_img); ?>" alt="No image available" style="width:100px;height:auto;">
                  </div>                
                </div>  
                <div class="form-row justify-content-center mt-3">
                  <div class="form-group col-md-4">
                     <label>Employee Type</label>
                     <input type="text" class="form-control" name="emp_type" id="emp_type" value="<?php echo e($rows->employee_type); ?>"placeholder="Employee Type">
                     <span id="emp_type_error"></span>
                  </div>
              
                  <div class="form-group col-md-4">
                      <label>Designation</label>
                      <select name="emp_designation" id="emp_designation" class="form-control">
                      <option selected disabled>select</option>
                        <option selected value="<?php echo e($rows->designation); ?>"><?php echo e($rows->designation); ?></option>
                        <?php if(count($designation) > 0): ?>
                          <?php $__currentLoopData = $designation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($desig->Employe_Desig_Name); ?>"><?php echo e($desig->Employe_Desig_Name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                  </div>
                </div>  

                <div class="form-row justify-content-center mt-2">
                  
                  <div class="form-group col-md-4">
                     <label>First Name</label>
                     <input type="text" class="form-control" name="emp_fname" id="emp_fname" value="<?php echo e($rows->first_name); ?>"placeholder="First Name">
                     <span id="emp_fname_error"></span>
                  </div>

                  <div class="form-group col-md-2">
                     <label>Middle Name</label>
                     <input type="text" class="form-control" name="emp_mname" id="emp_mname" value="<?php echo e($rows->middle_name); ?>"placeholder="Middle Name">
                     <span id="emp_mname_error"></span>
                  </div>
                  
                  <div class="form-group col-md-2">
                     <label>Last Name</label>
                     <input type="text" class="form-control" name="emp_lname" id="emp_lname" value="<?php echo e($rows->last_name); ?>"placeholder="Last Name">
                     <span id="emp_lname_error"></span>
                  </div>

                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group col-md-4">
                    <label>Date Of Birth</label>
                     <input type="Date" class="form-control" name="emp_dob" id="emp_dob" value="<?php echo e($rows->birth_date); ?>"placeholder="Date Of Birth">
                     <span id="emp_dob_error"></span>
                  </div>

                  <div class="form-group col-md-4">
                     <label>Nationality</label>
                     <input type="text" class="form-control" name="emp_nationality" id="emp_nationality" value="<?php echo e($rows->nationality); ?>" placeholder="Nationality">
                     <span id="emp_nationality_error"></span>
                  </div>
                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group col-md-4">
                    <label>Marital Status</label>
                     <input type="text" class="form-control" name="emp_marital_status" id="emp_marital_status" value="<?php echo e($rows->marital_status); ?>" placeholder="Marital Status">
                     <span id="emp_marital_status_error"></span>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Visa Issued From</label>
                     <input type="text" class="form-control" name="emp_visa" id="emp_visa" value="<?php echo e($rows->visa_Issued_from); ?>"placeholder="Visa Issued">
                     <span id="emp_visa_error"></span>
                  </div>
                </div>
                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                     <span id="update_error_area" style="display: none;"class="m-auto"></span>
                  </div>
                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                    <button type="button" id="emp_detail_update" class="btn btn-primary m-auto">Update Detail
                     </button>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
              </form>
            </div>
          </div>
        </div>
      </div>
</section>                 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>

  <script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>
<!-- /.card -->
<script type="text/javascript">
$(function() {
    $("#emp_designation").select2({
    theme:"classic",
    width: 'resolve'
  });

  $image_crop = $('#image-preview').croppie({
    enableExif:true,
    viewport:{
      width:100,
      height:100,
      type:'circle'
    },
    boundary:{
      width:200,
      height:200
    }
  });

  $('#upload_image').change(function(event){
    var reader = new FileReader();

    reader.onload = function(event){
      $image_crop.croppie('bind', {
        url:event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
  });  
}); 
  $("#emp_detail_update").click(function(event)
    { 

        var emp_type_val = $("#emp_type").val();
        var emp_designation_val = $("#emp_designation").val();
        var emp_fname_val = $("#emp_fname").val();
        var emp_mname_val = $("#emp_mname").val();
        var emp_lname_val = $("#emp_lname").val();
        var emp_dob_val = $("#emp_dob").val();
        var emp_nationality_val = $("#emp_nationality").val();
        var emp_marital_status_val = $("#emp_marital_status").val();
        var emp_visa_val = $("#emp_visa").val();
// console.log("type "+emp_type_val+" des "+emp_designation_val);
        // return false;
        if(emp_type_val == '' || emp_designation_val == '' || emp_designation_val == null || emp_fname_val == '' || emp_mname_val == '' || emp_lname_val == '' || emp_dob_val == '' || emp_nationality_val == '' || emp_marital_status_val == '' || emp_visa_val == '')
        {
            $("#update_error_area").show();
            $("#update_error_area").addClass("alert alert-danger").html("All Field Must be Required");
            return false;
        }
        else
        {
            $("#update_error_area").hide();
            $("#update_error_area").removeClass("alert alert-danger");
        }

      $image_crop.croppie('result', {
      type:'canvas',
      size:'viewport'
      }).then(function(response){
        
      // var _token = $('input[name=_token]').val();        
      var formData = document.getElementById('EmployeeDetailEdit');
      var form_data = new FormData(formData);
      form_data.append('image',response);

        
        $("#emp_submit").attr("disabled", true);

        $.ajax({
              type : "POST",
              url : "<?php echo e(route('Employee-Update')); ?>",
              data : form_data,
              processData : false,
              contentType : false,
              error: function(jqXHR,textStatus,errorThrown){
                $("#update_error_area").show();
                $("#update_error_area").addClass("alert alert-danger").html(errorThrown).css({
                "color": "#fff"});
                return false;
              },
              success : function(data){
                console.log(data);
                $("#emp_submit").attr("disabled", false);
                if(data['success'] == false)
                {
                    $("#update_error_area").show();
                    $("#update_error_area").addClass("alert alert-danger").html(data['message']).css({
                      "color": "#fff"});
                     window.location.href="<?php echo e(route('Employe-Master-Show')); ?>";
                }
                if(data["success"] == true)
                {

                    // $("#update_error_area").show();
                    // $("#update_error_area").html(data['message']);
                    // $("#update_error_area").addClass("alert alert-success").html(data['message']);
                    swal({
                        title: "Updated!",
                        text: "Employee Detail Updated Successfully...",
                        icon: "success",
                      });
                    window.location.href="<?php echo e(route('Employe-Master-Show')); ?>";    
                }
              }
            });
      });
    });    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/EmployeeMaster/EmployeeEdit.blade.php ENDPATH**/ ?>