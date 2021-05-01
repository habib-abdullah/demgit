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
                  <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i></a>  Add Employee Detail</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="EmployeeStore" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" class="form-control" value="<?php echo e(Session::get('eid')); ?>" id="emp_id" 
                name="emp_id">
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

                <div class="form-row justify-content-center mt-5">
                  <div class="form-group col-md-4">
                     <label>Employee Type</label>
                     <input type="text" class="form-control type_err" name="emp_type" id="emp_type" placeholder="Employee Type">
                     <div class="type_err_msg"></div>
                  </div>
                  <div class="form-group col-md-4">
                      <label>Designation</label>
                      <select name="emp_designation" id="emp_designation" class="form-control Designation_err">
                      <option selected disabled>Select</option>
                        <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Desig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Desig->Employe_Desig_Name); ?>"><?php echo e($Desig->Employe_Desig_Name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      <div class="Designation_err_msg"></div>
                  </div>
                </div>  

                <div class="form-row justify-content-center mt-2">
                  
                  <div class="form-group col-md-4">
                     <label>First Name</label>
                     <input type="text" class="form-control fname_err" name="emp_fname" id="emp_fname" placeholder="First Name">
                     <div class="fname_err_msg"></div>
                  </div>

                  <div class="form-group col-md-2">
                     <label>Middle Name</label>
                     <input type="text" class="form-control mname_err" name="emp_mname" id="emp_mname" placeholder="Middle Name">
                     <div class="mname_err_msg"></div>
                  </div>
                  
                  <div class="form-group col-md-2">
                     <label>Last Name</label>
                     <input type="text" class="form-control lname_err" name="emp_lname" id="emp_lname" placeholder="Last Name">
                     <div class="lname_err_msg"></div>
                  </div>

                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group col-md-4">
                    <label>Date Of Birth</label>
                     <input type="Date" class="form-control dob_err" name="emp_dob" id="emp_dob" placeholder="Date Of Birth">
                     <div class="dob_err_msg"></div>
                  </div>

                  <div class="form-group col-md-4">
                     <label>Nationality</label>
                     <input type="text" class="form-control nationality_err" name="emp_nationality" id="emp_nationality" placeholder="Nationality">
                     <div class="nationality_err_msg"></div>
                  </div>
                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group col-md-4">
                    <label>Marital Status</label>
                     <input type="text" class="form-control marital_status_err" name="emp_marital_status" id="emp_marital_status" placeholder="Marital Status">
                     <div class="marital_status_err_msg"></div>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Visa Issued From</label>
                     <input type="text" class="form-control visa_err" name="emp_visa" id="emp_visa" placeholder="Visa Issued">
                     <div class="visa_err_msg"></div>
                  </div>
                </div>
                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                     <span id="Insert_error_area" style="display: none;"class="m-auto"></span>
                  </div>
                </div>

                <div class="form-row justify-content-center mt-2">
                  <div class="form-group">
                    <button type="button" id="emp_submit" class="btn btn-primary m-auto">Submit
                     </button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- <img class="my-image" src="<?php echo e(url('public/plugins/Croppie/demo/demo-1.jpg')); ?>" /> -->

</section>                 
<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    
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
    $("#emp_submit").click(function(event)
    { 

        var profile_img_val = $("#upload_image").val();
        if(profile_img_val == '')
        {
            $('.profile_img_err_msg').html('Please Add Profile Image').addClass('text-danger');
            $("#Insert_error_area").show();
            $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
            return false;
        }
        else
        {
            //$('.bank_passbook_img_err').removeClass('border border-danger');
            $('.profile_img_err_msg').html('').removeClass('text-danger');
            $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
            
        }
        
        var emp_type_val = $("#emp_type").val();
        if (emp_type_val == "")
        {
           
          $(this).parents().find('.type_err').addClass('border border-danger');
          $(this).parents().find('.type_err_msg').html('Please Fill The type').addClass('text-danger');
          $("#Insert_error_area").show();
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.type_err').removeClass('border border-danger');
          $(this).parents().find('.type_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }
        
        var emp_fname_val = $("#emp_fname").val();
        if (emp_fname_val == "")
        {
           
          $(this).parents().find('.fname_err').addClass('border border-danger');
          $(this).parents().find('.fname_err_msg').html('Please Fill Field').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.fname_err').removeClass('border border-danger');
          $(this).parents().find('.fname_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }

        var emp_mname_val = $("#emp_mname").val();
        if (emp_mname_val == "")
        {
           
          $(this).parents().find('.mname_err').addClass('border border-danger');
          $(this).parents().find('.mname_err_msg').html('Please Fill Field').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.mname_err').removeClass('border border-danger');
          $(this).parents().find('.mname_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }

        var emp_lname_val = $("#emp_lname").val();
        if (emp_lname_val == "")
        {
           
          $(this).parents().find('.lname_err').addClass('border border-danger');
          $(this).parents().find('.lname_err_msg').html('Please Fill Field').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.lname_err').removeClass('border border-danger');
          $(this).parents().find('.lname_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }
        var emp_dob_val = $("#emp_dob").val();
        if (emp_dob_val == "")
        {
           
          $(this).parents().find('.dob_err').addClass('border border-danger');
          $(this).parents().find('.dob_err_msg').html('Please Fill DOB').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.dob_err').removeClass('border border-danger');
          $(this).parents().find('.dob_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }
        var emp_nationality_val = $("#emp_nationality").val();
        if (emp_nationality_val == "")
        {
           
          $(this).parents().find('.nationality_err').addClass('border border-danger');
          $(this).parents().find('.nationality_err_msg').html('Please Fill Nationality').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.nationality_err').removeClass('border border-danger');
          $(this).parents().find('.nationality_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }
        var emp_marital_status_val = $("#emp_marital_status").val();
        if (emp_marital_status_val == "")
        {
           
          $(this).parents().find('.marital_status_err').addClass('border border-danger');
          $(this).parents().find('.marital_status_err_msg').html('Please Fill Marital Status').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else 
        {
          $(this).parents().find('.marital_status_err').removeClass('border border-danger');
          $(this).parents().find('.marital_status_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }
        var emp_visa_val = $("#emp_visa").val();
        if (emp_visa_val == "")
        {
           
          $(this).parents().find('.visa_err').addClass('border border-danger');
          $(this).parents().find('.visa_err_msg').html('Please Fill Visa').addClass('text-danger');
          $("#Insert_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({"color": "#fff"});
          return false;
        }  
        else
        {
          $(this).parents().find('.visa_err').removeClass('border border-danger');
          $(this).parents().find('.visa_err_msg').html('').removeClass('text-danger');
          $("#Insert_error_area").removeClass("alert alert-danger").html("").css({"color": "#fff"});
        }

     $image_crop.croppie('result', {
      type:'canvas',
      size:'viewport'
      }).then(function(response){
        
      var _token = $('input[name=_token]').val();        
      var formData = document.getElementById('EmployeeStore');
      var form_data = new FormData(formData);
      form_data.append('image',response);

          $.ajax({

              type : "POST",
              url : "<?php echo e(route('Employee-Store')); ?>",
              data : form_data,
              processData : false,
              contentType : false,
              error: function(jqXHR,textStatus,errorThrown){
                $("#Insert_error_area").show();
                $("#Insert_error_area").addClass("alert alert-danger").html(errorThrown).css({
                  "color": "#fff"});
          
                return false;
              },
              success : function(data){

                $("#emp_submit").attr("disabled", false);

                console.log(data);
                // if(data['success'] == false)
                if(data.includes('Failed'))
                {
                    $("#Insert_error_area").show();
                    $("#Insert_error_area").addClass("alert alert-danger").html('Failed').css({
                      "color": "#fff"});
                }
                // if(data["success"] == true)
                if(data.includes('successfully'))
                {
                    swal({
                  title: "Stored..!",
                  text: "Employee Detail Stored Successfully...",
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Al_Chisty\resources\views/EmployeeMaster/EmployeeCreate.blade.php ENDPATH**/ ?>