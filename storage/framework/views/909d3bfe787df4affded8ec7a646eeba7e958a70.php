<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title">
              <a href="<?php echo e(route('Employee-Bank-Show')); ?>" style="font-size: 18px;"><i
                  class="fas fa-arrow-circle-left"></i></a> Add Employee Bank Detail
            </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="EmployeeBankStoreForm">
            <?php echo csrf_field(); ?>

            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-2 mt-3" id="emp_profile_img">

              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <input type="hidden" class="form-control" value="<?php echo e(Session::get('employee_id')); ?>" id="emp_id"
                name="emp_id">
              <div class="form-group col-md-4">
                <label>Employee Name<span class="emp_name_err text text-danger"> ***</span></label>
                <select class="form-control" name="emp_name" id="emp_name">
                  <option selected disabled>Select</option>
                  <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($rows->employee_id); ?>" data-project="<?php echo e($rows->employee_id); ?>"><?php echo e($rows->first_name); ?>

                    <?php echo e($rows->last_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Bank Name</label>
                <input type="text" class="form-control bank_name_err" name="emp_bank_name" id="emp_bank_name"
                  placeholder="Enter Bank Name">
                <div class="bank_name_err_msg"></div>
              </div>

            </div>

            <div class="form-row justify-content-center mt-2">

              <div class="form-group col-md-4">
                <label>Branch Name</label>
                <input type="text" class="form-control branch_name_err" name="emp_branch_name" id="emp_branch_name"
                  placeholder="Enter Branch Name">
                <div class="branch_name_err_msg"></div>
              </div>

              <div class="form-group col-md-4">
                <label>Account Number</label>
                <input type="text" class="form-control acc_no_err" name="emp_ac_no" id="emp_ac_no"
                  placeholder="Enter Account Number">
                <div class="acc_no_err_msg"></div>
              </div>

            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>Account Type</label>
                <input type="text" class="form-control acc_type_err" name="emp_ac_type" id="emp_ac_type"
                  placeholder="Enter Account Type">
                <div class="acc_type_err_msg"></div>
              </div>

              <div class="form-group col-md-4">
                <label>IFSC Code</label>
                <input type="text" class="form-control ifsc_code_err" name="emp_ifsc_code" id="emp_ifsc_code"
                  placeholder="Enter IFSC Code">
                <div class="ifsc_code_err_msg"></div>
              </div>
            </div>
            <div class="form-row justify-content-center mt-2">
              <div class="form-group col-md-4">
                <label>IBAN</label>
                <input type="text" class="form-control iban_no_err" name="emp_iban_no" id="emp_iban_no"
                  placeholder="Enter IBAN no">
                <div class="iban_no_err_msg"></div>
              </div>

              <div class="form-group col-md-4 mt-1">
                <label>Bank Passbook</label>
                <input type="file" accept="image/x-png,image/jpeg" name="bank_passbook_img" id="bank_passbook_img"
                  class="bank_passbook_img_err">
                <div class="bank_passbook_img_err_msg"></div>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group">
                <span id="emp_bank_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" onclick="EmployeeBankStore()" id="emp_bank_submit"
                  class="btn btn-primary m-auto">Submit
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.card -->
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(url('public/dist/js/demo.js')); ?>"></script>
<script>
$(function() {

  $("#emp_name").select2({
    theme: "classic",
    width: 'resolve'
  });
  
  $('#emp_name').on('change', function() {
    let id = $(this).val();
    $('#emp_profile_img').empty();
    $('#emp_profile_img').append(``);
    $.ajax({
      type: 'GET',
      url: 'GetEmployeeProfilePicture/' + id,
      success: function(response) {
        var response = JSON.parse(response);
        console.log(response);
        $('#emp_profile_img').empty();
        $('#emp_profile_img').append(``);
        response.forEach(element => {
          $('#emp_profile_img').append(
            `<img src="<?php echo e(url('/')); ?>/public/crop_image/${element['emp_profile_img']}" alt="No image available" style="width:100px;height:auto;">`
          );
        });
      }
    });
  });


});

function EmployeeBankStore() {
  toastr.options = {
    "debug": false,
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000
  }
  //form validation code
  var bank_name_val = $("#emp_bank_name").val();
  if (bank_name_val == "") {

    $('.bank_name_err').addClass('border border-danger');
    $('.bank_name_err_msg').html('Please Fill The Bank Name').addClass('text-danger');
    $("#emp_bank_error_area").show();
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.bank_name_err').removeClass('border border-danger');
    $('.bank_name_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }

  var bank_branch_val = $("#emp_branch_name").val();
  if (bank_branch_val == "") {

    $('.branch_name_err').addClass('border border-danger');
    $('.branch_name_err_msg').html('Please Fill Bank Branch').addClass('text-danger');
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.branch_name_err').removeClass('border border-danger');
    $('.branch_name_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }

  var account_no_val = $("#emp_ac_no").val();
  if (account_no_val == "") {

    $('.acc_no_err').addClass('border border-danger');
    $('.acc_no_err_msg').html('Please Insert Account Number').addClass('text-danger');
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.acc_no_err').removeClass('border border-danger');
    $('.acc_no_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }

  var account_type_val = $("#emp_ac_type").val();
  if (account_type_val == "") {

    $('.acc_type_err').addClass('border border-danger');
    $('.acc_type_err_msg').html('Please Fill Account type').addClass('text-danger');
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.acc_type_err').removeClass('border border-danger');
    $('.acc_type_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }
  var ifsc_code_val = $("#emp_ifsc_code").val();
  if (ifsc_code_val == "") {

    $('.ifsc_code_err').addClass('border border-danger');
    $('.ifsc_code_err_msg').html('Please Insert IFSC Code').addClass('text-danger');
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.ifsc_code_err').removeClass('border border-danger');
    $('.ifsc_code_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }
  var iban_no_val = $("#emp_iban_no").val();
  if (iban_no_val == "") {

    $('.iban_no_err').addClass('border border-danger');
    $('.iban_no_err_msg').html('Please Insert IBAN Code').addClass('text-danger');
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    $('.iban_no_err').removeClass('border border-danger');
    $('.iban_no_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }

  var bank_passbook_img_val = $("#bank_passbook_img").val();
  if (bank_passbook_img_val == '') {
    //$('.bank_passbook_img_err').addClass('border border-danger');
    $('.bank_passbook_img_err_msg').html('Please Add Bank Passbook Image').addClass('text-danger');
    $("#emp_bank_error_area").show();
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    //$('.bank_passbook_img_err').removeClass('border border-danger');
    $('.bank_passbook_img_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });

  }
  var ext = $('#bank_passbook_img').val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
    //$('.bank_passbook_img_err').addClass('border border-danger');
    $('.bank_passbook_img_err_msg').html('**Allowed File types png, jpg, jpeg').addClass('text-danger');
    $("#emp_bank_error_area").show();
    $("#emp_bank_error_area").addClass("alert alert-danger").html("All Filed Must be required..").css({
      "color": "#fff"
    });
    return false;
  } else {
    //$('.bank_passbook_img_err').removeClass('border border-danger');
    $('.bank_passbook_img_err_msg').html('').removeClass('text-danger');
    $("#emp_bank_error_area").removeClass("alert alert-danger").html("").css({
      "color": "#fff"
    });
  }

  var formData = document.getElementById('EmployeeBankStoreForm');
  var form_data = new FormData(formData);

  $("#emp_bank_submit").attr("disabled", true);
  $.ajax({

    type: "POST",
    url: "<?php echo e(route('Employee-Bank-Store')); ?>",
    data: form_data,
    processData: false,
    contentType: false,
    error: function(jqXHR, textStatus, errorThrown) {
      $("#emp_bank_error_area").show();
      $("#emp_bank_error_area").addClass("alert alert-danger").html(errorThrown).css({
        "color": "#fff"
      });
      // $(".emp_name_err").show().html('Please Select Employee Name');
      // $("#emp_bank_submit").attr("disabled", true);
      return false;
    },
    success: function(data) {

      $("#emp_bank_submit").attr("disabled", false);

      console.log(data);
      if (data["success"] == true) {
        swal({
          title: "Stored..!",
          text: "Employee Bank Detail Stored Successfully...",
          icon: "success",
        });
        window.location.href = "<?php echo e(route('Employee-Bank-Show')); ?>";

      } else {
        $("#emp_bank_error_area").show();
        $("#emp_bank_error_area").addClass("alert alert-danger").html(data['message']).css({
          "color": "#fff"
        });
        return false;
      }
    }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/EmployeeBank/AddBankDetail.blade.php ENDPATH**/ ?>