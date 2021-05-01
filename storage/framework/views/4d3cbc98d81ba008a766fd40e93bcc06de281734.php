<?php $__env->startSection('content'); ?>
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <a href="<?php echo e(route('Client')); ?>" style="font-size: 18px;"><i class="fas fa-arrow-circle-left"></i>Back</a>
            </h3>
            <!-- <button onclick="getit()">click</button> -->
          </div>
          <!-- form start -->
          <form id="ClientStoreForm">
            <?php echo csrf_field(); ?>
            <div class="form-row justify-content-center mt-5">
              <div class="form-group col-md-4">
                <label>Client Name</label>
                <input type="text" class="form-control required" name="client_name" id="client_name"
                  placeholder="Enter Client Name">
              </div>
              <div class="form-group col-md-4">
                <label>Company Name</label>
                <input type="text" class="form-control required" name="company_name" id="company_name"
                  placeholder="Enter Company Name">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Code</label>
                <input type="text" class="form-control required" name="code" id="code" placeholder="Enter Code">
              </div>
              <div class="form-group col-md-4">
                <label>Company Address</label>
                <input type="text" class="form-control required" name="company_address" id="company_address"
                  placeholder="Enter Company Address">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Company State</label>
                <input type="text" class="form-control required" name="company_state" id="company_state"
                  placeholder="Enter Company State">
              </div>
              <div class="form-group col-md-4">
                <label>Company Country</label>
                <select class="form-control selectBox" name="company_country" id="company_country">
                  <option selected disabled>Select</option>
                </select>
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>POBOX</label>
                <input type="text" class="form-control required " name="pobox" id="pobox" placeholder="Enter POBOX">
              </div>
              <div class="form-group col-md-4">
                <label>Company Fax</label>
                <input type="text" class="form-control required" name="company_fax" id="company_fax"
                  placeholder="Enter Company Fax">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Company Phone</label>
                <input type="text" class="form-control required" name="company_phone" id="company_phone"
                  placeholder="Enter Company Phone"
                  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
              <div class="form-group col-md-4">
                <label>Company Mobile</label>
                <input type="text" class="form-control required" name="company_mobile" id="company_mobile"
                  placeholder="Enter Company Mobile"
                  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Company Email</label>
                <input type="text" class="form-control required" name="company_email" id="company_email"
                  placeholder="Enter Company Email">
              </div>
              <div class="form-group col-md-4">
                <label>Company Website</label>
                <input type="text" class="form-control required" name="company_website" id="company_website"
                  placeholder="Enter Company Website">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Client Type</label>
                <select class="form-control selectBox" name="client_type" id="client_type">
                  <option selected disabled>Select</option>
                  <option value="Client">Client</option>
                  <option value="Vendor">Vendor</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label>Balance Limit</label>
                <input type="text" class="form-control required" name="balance_limit" id="balance_limit"
                  placeholder="Enter Company Balance Limit">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Credit Duration</label>
                <input type="text" class="form-control required" name="credit_duration" id="credit_duration"
                  placeholder="Enter Credit Duration">
              </div>
              <div class="form-group col-md-4">
                <label>Trade License Register Authority</label>
                <input type="text" class="form-control required" name="trade_license_register_authority"
                  id="trade_license_register_authority" placeholder="Enter Trade License Register Authority">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Trade License Number</label>
                <input type="text" class="form-control required" name="trade_license_number" id="trade_license_number"
                  placeholder="Enter Trade License Number">
              </div>
              <div class="form-group col-md-4">
                <label>Trade License Issue Date</label>
                <input type="date" class="form-control required" name="trade_license_issue_date"
                  id="trade_license_issue_date" placeholder="Enter Trade License Issue Date">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Trade License Expiry Date</label>
                <input type="date" class="form-control required" name="trade_license_expiry_date"
                  id="trade_license_expiry_date" placeholder="Enter Trade License Expiry Date">
              </div>
              <div class="form-group col-md-4">
                <label>TRN Number</label>
                <input type="text" class="form-control required" name="trn_number" id="trn_number"
                  placeholder="Enter TRN Number">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group col-md-4">
                <label>Company Site</label>
                <select class="form-control selectBox" name="company_site" id="company_site">
                  <option selected disabled>Select</option>
                  <option value="main_site">Main Site</option>
                  <option value="customer_site">Work @ Customer Site</option>
                </select>
              </div>
              <div class="form-group col-md-4">
              </div>
            </div>
            <div class="form-row justify-content-center mt-3">
              <div class="form-group ">
                <span id="show_error" style="display: none;" class="m-auto"></span>
              </div>
            </div>

            <div class="form-row justify-content-center mt-2">
              <div class="form-group">
                <span id="emp_bank_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" onclick="ClientStore()" id="btnSubmit" class="btn btn-primary m-auto">Submit
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(url('public/dist/js/demo.js')); ?>"></script>

<script>
$(function() {

  $("#company_country").select2({
    theme: "classic",
    width: 'resolve'
  });

  $.get("<?php echo e(route('Client-Countries')); ?>", function(data) {
    for (let node of data[0]['result']) {
      // console.log(node['name']);
      $('#company_country')
        .append($("<option></option>")
          .attr("value", node['name'])
          .text(node['name']));
    }
    // console.log(data[0]);
    // console.log(data[0]);
  });


});

function getit() {
  $.get("<?php echo e(route('Client-Countries')); ?>", function(data) {
    for (let node of data[0]['result']) {
      console.log(node['name']);
    }
    // console.log(data[0]);
    // console.log(data[0]);
  });
}

function ClientStore() {
  toastr.options = {
    "debug": false,
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000
  }

  var fields = $("input[class*='required']");
  // console.log(fields.val());
  for (let i = 0; i <= fields.length; i++) {
    // console.log(fields);
    if ($(fields[i]).val() === '') {
      var currentElement = $(fields[i]).attr('id');
      var value = currentElement.replaceAll('_', ' ');
      $("#show_error").removeClass().html('');
      $("#show_error").show().addClass('alert alert-danger').html('The ' + value + ' field is required.');
      return false;
    } else {
      $("#show_error").hide().removeClass().html('');
    }
  }

  if ($("#company_country").filter(':selected').text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The company country field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }
  if ($("#client_type").filter(':selected').text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The client type field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }
  if ($("#company_site").filter(':selected').text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The company site field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }

  // $('.selectBox option').each(function() { // check all select box values
  // var i = 0;
  //   if($(this).filter(':selected').text() === 'Select'){ // js method
  //     let js = this.selected;
  //     let currentElement =$(this).filter(':selected').attr('id');
  //     // let value = currentElement.replaceAll('_', ' ');
  //     console.log(currentElement);
  //     // console.log($(this).filter(':selected').text());
  //   }
  //   // else{
  //   //   console.log($(this).is(':selected')+"else");
  //   // }
  // });

  // console.log('reached');
  // return false;

  var formData = document.getElementById('ClientStoreForm');
  var form_data = new FormData(formData);

  $("#btnSubmit").prop("disabled", true);
  $.ajax({

    type: "POST",
    url: "<?php echo e(route('Client-Store')); ?>",
    data: $("#ClientStoreForm").serialize(),
    error: function(jqXHR, textStatus, errorThrown) {
      $("#btnSubmit").prop("disabled", false);
      $("#show_error").show();
      $("#show_error").addClass("alert alert-danger").html(errorThrown).css({
        "color": "#fff"
      });
      return false;
    },
    success: function(data) {

      $("#btnSubmit").prop("disabled", false);

      console.log(data);
      if (data["success"] == true) {
        swal({
          title: "Stored..!",
          text: "Client has been stored successfully...",
          icon: "success",
        });
        window.location.href = "<?php echo e(route('Client')); ?>";

      } else {
        $("#show_error").removeClass().html('').show();
        $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
        return false;
      }
    }
  });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/Client/ClientCreate.blade.php ENDPATH**/ ?>