<?php $__env->startSection('content'); ?>
<section class="content pt-3">
      <div class="container-fluid">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Admission</h3>
                <span id="input_error" style="float:right; padding-right: 10px;"></span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="admissionForm" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <!-- <div class="form-group" >
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group" style="cursor: pointer;">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" style="cursor: pointer;">
                        <label class="custom-file-label" for="exampleInputFile" >Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <label for=""><span style="color:red; font-size:18px;">*</span>Candidate Image</label>
                  </div>
                  <div class="col-lg-4" style="margin-left:12%">
                    <div id="image-cropper">
                      <!-- This is where the preview image is displayed -->
                      <div class="cropit-preview"></div>
                      
                      <!-- This range input controls zoom -->
                      <!-- You can add additional elements here, e.g. the image icons -->
                      <input type="range" class="cropit-image-zoom-input" />
                      
                      <!-- This is where user selects new image -->
                      <input type="file" class="cropit-image-input" />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Full Name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Select Date Of Birth">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Birth Place</label>
                    <input type="text" name="place" class="form-control" id="place" placeholder="Enter Birth Place">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Native Address</label>
                    <input type="text" name="native_address" class="form-control" id="native_address" placeholder="Enter Native Address">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Mobile Number</label>
                    <input type="number" name="mobile_number" class="form-control" id="mobile_number" placeholder="Enter Native Address">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Qualification</label>
                    <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Enter Qualification">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Local Guardian Name</label>
                    <input type="text" name="local_guardian_name" class="form-control" id="local_guardian_name" placeholder="Enter Guaridan Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Local Guardian's Mobile Number</label>
                    <input type="number" name="local_guardian_mobile_number" class="form-control" id="local_guardian_mobile_number" placeholder="Optional">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Local Guardian Address</label>
                    <input type="text" name="local_guardian_address" class="form-control" id="local_guardian_address" placeholder="Enter Guaridan Address">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                </div>

                <div class="col-md-6">
                <div class="card-body">
                
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Father's Mobile Number</label>
                    <input type="number" name="father_mobile_number" class="form-control" id="father_mobile_number" placeholder="Enter Father's Mobile Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mother's Mobile Number</label>
                    <input type="number" name="mother_mobile_number" class="form-control" id="mother_mobile_number" placeholder="Optional">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Parent Address</label>
                    <input type="text" name="parent_address" class="form-control" id="parent_address" placeholder="Enter Parent Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Anual Income</label>
                    <input type="number" name="yearly_income" class="form-control" id="yearly_income" placeholder="Enter Anual Income">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>Date Of  Admission</label>
                    <input type="date" name="date_of_admission" class="form-control" id="date_of_admission" placeholder="Enter Date Of Admission">
                  </div>
                  <div class="form-group">
                    <label for="">Fees</label>
                    <input type="text" name="fees" id="fees" class="form-control" placeholder="Enter Fees Amount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"><span style="color:red; font-size:18px;">*</span>UPSC Prelim Already Attemp</label>
                    <label class="checkbox-inline" style="padding-left: 10px;" >
                      <input type="checkbox" id="upsc_prelim_attemp" name="upsc_prelim_attemp" value="1" >
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Candidate Application Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Application Password">
                  </div>
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                  <div id="response"></div>

                  <div class="card-footer">
                    <button type="button" id="btnSave" class="btn btn-primary" onclick="Save()">Submit</button>
                  </div>
                  

                  
                </div>
                <!-- /.card-body -->
                </div>
                
              </form>
            
        </div>
    </div>
</section>
<script>var base_url = "<?php echo e(url('/')); ?>";</script>

<style>
  .cropit-preview {
    /* You can specify preview size in CSS */
    width: 180px;
    height: 200px;
    border: 1px solid #CCC;
    margin: auto;
    float: none;
    cursor: pointer;
  }
</style>
<script src="<?php echo e(url('public/jquery.cropit.js')); ?>"></script>

<script>
$( document ).ready(function() {
  $('#image-cropper').cropit();
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function Save(){
    
    var postText = $("#postTextp").val();
    // All inputs for client side validation
    var full_name = $("#full_name").val();
    var date_of_birth = $("#date_of_birth").val();
    var place = $("#place").val();
    var native_address = $("#native_address").val();
    var mobile_number = $("#mobile_number").val();
    var qualification = $("#qualification").val();
    var local_guardian_name = $("#local_guardian_name").val();
    var local_guardian_address = $("#local_guardian_address").val();
    var father_name = $("#father_name").val();
    var father_mobile_number = $("#father_mobile_number").val();
    var mother_name = $("#mother_name").val();
    var parent_address = $("#parent_address").val();
    var yearly_income = $("#yearly_income").val();

    var imageData = $('#image-cropper').cropit('export');
    // console.log("img;"+imageData)
    if(imageData==null || imageData==""){
      alert("Select Image");
      return false;
    }else if(full_name == "" || date_of_birth == ""  || place == "" || native_address == "" || 
    mobile_number == "" || qualification == "" || local_guardian_name == "" || father_name == "" || 
    local_guardian_address == "" || father_mobile_number == "" || mother_name == "" || 
    parent_address == "" || yearly_income == "")
    {
      $("form#admissionForm input[type=text],input[type=number],input[type=date]").css("border-color","red");
      alert('please fill all mandatory fields');
      //$("#input_error").html('Please fill all mandatory fields');
      return false;
    }
     
    var formData = $('#admissionForm').serialize()+ "&picture="+imageData;
    $("#btnSave").prop("disabled",true)
        $.ajax({
           type:'POST',
           url:base_url+"/PostAdmission",
           data: formData,
          //  data:$("#admissionForm").serialize(),
          contentType:"application/x-www-form-urlencoded",
           //processData: false,      
          // contentType: true,
           success:function(data){
              console.log(data);
              $("#response").html(data);
              $("#btnSave").prop("disabled",false);
              $("form#admissionForm input[type=text],input[type=number],input[type=date]").css("border-color","#CED4DA");
              if(data.includes('successfully')){
                window.location.href = "<?php echo e(url('AdmissionReport')); ?>";
              }
              //GetLastPost();
            }
        });
}
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hcoi\resources\views/Admission/NewAdmission.blade.php ENDPATH**/ ?>