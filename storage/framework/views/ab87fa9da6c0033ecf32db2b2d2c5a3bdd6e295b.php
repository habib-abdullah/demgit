<?php $__env->startSection('content'); ?>
<section class="content">
      <div class="container-fluid">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="admissionForm">
              <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Enter Full Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" placeholder="Select Date Of Birth">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Birth Place</label>
                    <input type="text" name="place" class="form-control" id="place" placeholder="Enter Birth Place">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Native Address</label>
                    <input type="text" name="native_address" class="form-control" id="native_address" placeholder="Enter Native Address">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile Number</label>
                    <input type="number" name="mobile_number" class="form-control" id="mobile_number" placeholder="Enter Native Address">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Qualification</label>
                    <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Enter Qualification">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Local Guaridan Name</label>
                    <input type="text" name="local_guardian_name" class="form-control" id="local_guardian_name" placeholder="Enter Guaridan Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Local Guaridan's Mobile Number</label>
                    <input type="number" name="local_guardian_mobile_number" class="form-control" id="local_guardian_mobile_number" placeholder="Enter Guaridan's Mobile Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Local Guaridan Address</label>
                    <input type="text" name="local_guardian_address" class="form-control" id="local_guardian_address" placeholder="Enter Guaridan Address">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                </div>

                <div class="col-md-6">
                <div class="card-body">
                
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Father's Mobile Number</label>
                    <input type="number" name="father_mobile_number" class="form-control" id="father_mobile_number" placeholder="Enter Father's Mobile Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mother Name</label>
                    <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mother's Mobile Number</label>
                    <input type="number" name="mother_mobile_number" class="form-control" id="mother_mobile_number" placeholder="Enter Mother's Mobile Number">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Parent Address</label>
                    <input type="text" name="parent_address" class="form-control" id="parent_address" placeholder="Enter Parent Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Anual Income</label>
                    <input type="number" name="yearly_income" class="form-control" id="yearly_income" placeholder="Enter Anual Income">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date Of  Admission</label>
                    <input type="date" name="date_of_admission" class="form-control" id="date_of_admission" placeholder="Enter Date Of Admission">
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
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

   
function Save(){
    var postText = $("#postTextp").val();
    $("#btnSave").prop("disabled",true)
        $.ajax({
           type:'POST',
           url:base_url+"/PostAdmission",
           data:$("#admissionForm").serialize(),
           success:function(data){
              console.log(data);
              $("#response").html(data)
              $("#btnSave").prop("disabled",false)
              //GetLastPost();
           }
        });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lara\hcoi\resources\views/NewAdmission.blade.php ENDPATH**/ ?>