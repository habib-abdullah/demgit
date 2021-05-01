<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(url('Croppie/croppie.css')); ?>" />
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header p-0">
            <h3 class="card-title p-3">
              <a href="<?php echo e(route('Employe-Master-Show')); ?>" style="font-size: 18px;"><i
                  class="fas fa-arrow-circle-left"></i> Back </a>
            </h3>
            <div class=" float-right">
              <h3 class="card-title p-3">
                Add Employee Detail
              </h3>
            </div>
          </div>
          <div class="card-header d-flex p-0">
            <ul class="nav nav-pills mr-auto p-2">
              <li class="nav-item"><a class="nav-link " href="Employee-<?php echo e($employee_id); ?>-Edit-Detail">
                  Personal info </a>
              </li>
              <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">Profile</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Passport">Passport
                  details</a></li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Residency">Residency details</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Mol-Record">MOL
                  record</a></li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Health">Health</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Contact">Contact
                  Info</a></li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Bank">Bank
                  details</a></li>
              <li class="nav-item"><a class="nav-link" href="Employee-<?php echo e($employee_id); ?>-Login-Detail">Company & Login
                  Details</a></li>
            </ul>
          </div>
          <div class="card-body">
            <form id="EmployeeStore" enctype="multipart/form-data">
              <div class="tab-content">
                <?php echo csrf_field(); ?>
                <div class="tab-pane active " id="tab_2">
                  <input type="hidden" class="form-control" value="<?php echo e($employee_id); ?>" id="employee_id"
                    name="employee_id">
                  <div class="form-row justify-content-center mt-3">
                    <div class="form-group col-md-4 mt-3">
                      <div id="image-preview" class="mt-3"></div>
                    </div>
                    <?php if(!empty($employee[0]->emp_profile_img)): ?>
                    <div class="form-group col-md-4 mt-5">
                      <img src="<?php echo e(url('public/crop_image/')); ?>/<?php echo e($employee[0]->emp_profile_img); ?>" alt=""
                        class="border border-secondary img-thumbnail">
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-row justify-content-center ml-5">
                    <div class="form-group col-md-4">
                      <input type="file" name="upload_image" id="upload_image" accept="image/x-png,image/jpeg" />
                    </div>
                    <?php if(!empty($employee[0]->emp_profile_img)): ?>
                    <div class="form-group col-md-4">
                    </div>
                    <?php endif; ?>
                  </div>
                  <div class="form-row justify-content-center mt-2">
                    <div class="form-group" id="show_error">
                    </div>
                  </div>
                  <a href="Employee-<?php echo e($employee_id); ?>-Edit-Detail" class="btn btn-primary text-white float-left"
                    style="font-size: 18px;"> Previous
                  </a>
                  <a id="btnSubmit" class="btn btn-success text-white float-right" style="font-size: 18px;"> Submit &
                    Next
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- //Select 2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- croppie plugin -->
<script src="<?php echo e(url('Croppie/croppie.js')); ?>"></script>

<script type="text/javascript">
$(document).ready(function() {

  $image_crop = $('#image-preview').croppie({
    enableExif: true,
    viewport: {
      width: 200,
      height: 200,
      type: 'square'
    },
    boundary: {
      width: 240,
      height: 240
    }
  });

  $('#upload_image').change(function(event) {
    var reader = new FileReader();

    reader.onload = function(event) {
      $image_crop.croppie('bind', {
        url: event.target.result
        // $image_crop.croppie('result')
      }).then(function() {
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    // console.log(reader);
    // console.log('. url .');
    // console.log($image_crop.croppie('result'));
    // return false;
  });

  $("#btnSubmit").click(function(event) {

    if ($("#upload_image").val() == '') {
      // $("#show_error").removeClass().show().html('');
      // $("#show_error").addClass("alert alert-danger").html('Please select an image');
      next_url = 'Employee-' + "<?php echo e($employee_id); ?>" + '-Passport';
      window.location.href = next_url;
      return false;
    }
    // else {
    //   $("#show_error").removeClass().hide().html('');
    // }

    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport',
    }).then(function(response) {
      // console.log(response); // what you get after image bind
      // return false; 
      var _token = $('input[name=_token]').val();
      var formData = document.getElementById('EmployeeStore');
      var form_data = new FormData(formData);
      form_data.append('image', response);

      $.ajax({

        type: "POST",
        url: "<?php echo e(route('Employee-Profile-Store')); ?>",
        data: form_data,
        processData: false,
        contentType: false,
        error: function(jqXHR, textStatus, errorThrown) {
          $("#show_error").removeClass().show().html('');
          $("#show_error").addClass("alert alert-danger").html(
            errorThrown);
          $("#btnSubmit").prop("disabled", false);
        },
        success: function(data) {

          $("#btnSubmit").prop("disabled", false);

          console.log(data);
          // return false;
          if (data['success'] == true) {
            console.log(data['message']);
            next_url = 'Employee-' + data['employee_id'] + '-Passport';
            window.location.href = next_url;
          } else {
            if (data['validation'] == false) {
              $("#show_error").removeClass().show().html('');
              $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
              return false;
            }
            $("#show_error").removeClass().show().html('');
            $("#show_error").addClass("alert alert-danger").html(data['message']);
          }
        }
      });
    });
  });

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeMaster/EmployeeCreate-tab2.blade.php ENDPATH**/ ?>