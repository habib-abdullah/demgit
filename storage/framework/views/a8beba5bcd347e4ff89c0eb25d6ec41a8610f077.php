<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12 mb-2">
      <div class="card shadow">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">Client Log</div>
            </div>
            <div class="col-auto">
              <button type="button" class="btn btn-primary px-4" data-toggle="modal"
                data-target="#logStoreModal">Add Log</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="logStoreModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Visitor</h4>
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form id="LogStoreForm" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <lable>Channel</lable>
            <select class="form-control" name="visitor_type" id="visitor_type">
              <option selected value="Visitor">Visitor</option>
              <option value="Call">Call</option>
            </select>
          </div>
          <div class="form-group">
            <lable>Visit Time</lable>
            <input type="datetime-local" class="form-control form-control-user border-primary required " id="visit_time"
              name="visit_time" autocomplete=" off">
          </div>
          <div class="form-group">
            <lable>Customer</lable>
            <select class="form-control select2" name="client_id" id="client_id" style="width:100%">
              <option selected disabled>Select</option>
              <?php if(count($clients) > 0): ?>
              <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($client->client_id); ?>"><?php echo e($client->company_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <lable>Visitor Name</lable>
            <input type="text" class="form-control form-control-user border-primary required" id="visitor_name"
              name="visitor_name" autocomplete="off" placeholder="Enter Visitor Name">
          </div>
          <div class="form-group">
            <lable>Visitor Mobile</lable>
            <input type="number" class="form-control form-control-user border-primary required" id="visitor_mobile"
              name="visitor_mobile" autocomplete="off" placeholder="Enter Visitor mobile">
          </div>
          <div class="form-group">
            <lable>Attended By</lable>
            <select class="form-control select2" name="employee_id" id="employee_id" style="width:100%">
              <option selected disabled>Select</option>
              <?php if(count($employees) > 0): ?>
              <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($employee->employee_id); ?>"><?php echo e($employee->first_name); ?>

                <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <lable>Purpose</lable>
            <input type="text" class="form-control form-control-user border-primary required" id="visitor_purpose"
              name="visitor_purpose" autocomplete="off" placeholder="Enter Visitor purpose">
          </div>
          <div class="form-group">
            <lable>Note</lable>
            <input type="text" class="form-control form-control-user border-primary" id="visitor_note"
              name="visitor_note" autocomplete="off" placeholder="Enter Visitor note">
          </div>
          <div class="form-group">
            <lable>Attachments</lable>
            <input type="file" class="form-control form-control-user border-primary" id="attachment_file"
              name="attachment_file[]" multiple="multiple" autocomplete="off">
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <div class="form-row mt-3 mx-auto">
          <div class="form-group text-center">
            <span id="show_error" style="display: none;" class="m-auto"></span>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnSubmit" onclick="LogStore()" class="btn btn-primary CloseBtn">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="LogEditModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Visitor Details</h4>
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form id="EditStoreForm" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <input type="hidden" id="visitors_id" name="visitor_id">
          <div class="form-group">
            <lable>Channel</lable>
            <select class="form-control" name="visitor_type" id="visitors_type">
              <option value="Visitor">Visitor</option>
              <option value="Call">Call</option>
            </select>
          </div>
          <div class="form-group">
            <lable>Visit Time</lable>
            <input type="datetime-local" class="form-control form-control-user border-primary log_input "
              id="visits_time" name="visit_time" autocomplete=" off">
          </div>
          <div class="form-group">
            <lable>Customer</lable>
            <select class="form-control select2" name="client_id" id="clients_id" style="width:100%">
              <!-- <option disabled>Select</option> -->
              <?php if(count($clients) > 0): ?>
              <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($client->client_id); ?>"><?php echo e($client->company_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <lable>Visitor Name</lable>
            <input type="text" class="form-control form-control-user border-primary log_input" id="visitors_name"
              name="visitor_name" autocomplete="off" placeholder="Enter Visitor Name">
          </div>
          <div class="form-group">
            <lable>Visitor Mobile</lable>
            <input type="number" class="form-control form-control-user border-primary log_input" id="visitors_mobile"
              name="visitor_mobile" autocomplete="off" placeholder="Enter Visitor mobile">
          </div>
          <div class="form-group">
            <lable>Attended By</lable>
            <select class="form-control select2" name="employee_id" id="employees_id" style="width:100%">
              <!-- <option disabled>Select</option> -->
              <?php if(count($employees) > 0): ?>
              <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($employee->employee_id); ?>"><?php echo e($employee->first_name); ?>

                <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
          <div class="form-group">
            <lable>Purpose</lable>
            <input type="text" class="form-control form-control-user border-primary log_input" id="visitors_purpose"
              name="visitor_purpose" autocomplete="off" placeholder="Enter Visitor purpose">
          </div>
          <div class="form-group">
            <lable>Note</lable>
            <input type="text" class="form-control form-control-user border-primary" id="visitors_note"
              name="visitor_note" autocomplete="off" placeholder="Enter Visitor note">
          </div>
          <div class="form-group">
            <lable>Attachments</lable>
            <input type="file" class="form-control form-control-user border-primary" id="attachments_file"
              name="attachment_file[]" multiple="multiple" autocomplete="off">
          </div>
        </form>
      </div>
      <div class="modal-footer ">
        <div class="form-row mt-3 mx-auto">
          <div class="form-group text-center">
            <span id="edit_show_error" style="display: none;" class="m-auto"></span>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btnUpdate" onclick="LogUpdate()" class="btn btn-primary CloseBtn">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header">
      <div class="row input-daterange justify-content-end" id="datepicker">
        <div class="col-md-2">
          <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
        </div>
        <div class="col-md-2">
          <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
        </div>
        <div class="col-md-2">
          <button type="button" name="filter" id="filter" class="btn btn-primary px-5">Filter</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="LogDataTable" class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Visit Time</th>
              <th>Company</th>
              <th>Customer Name</th>
              <th>Mobile</th>
              <th>Channel</th>
              <th>To Visit</th>
              <th>Purpose</th>
              <th>Note</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DepartmentViewModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-primary">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Department</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="list-group">
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Name </b>
            <a class="float-right" id="name_view">asdsdfasdf</a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Code </b>
            <a class="float-right" id="code_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Location </b>
            <a class="float-right" id="location_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Description </b>
            <a class="float-right" id="description_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Supervised By </b>
            <a class="float-right" id="supervised_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Excluded from floor Load </b>
            <a class="float-right" id="exclude_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Site </b>
            <a class="float-right" id="site_view"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Created At </b>
            <a class="float-right" id="created_at"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Updated At </b>
            <a class="float-right" id="updated_at"></a>
          </li>
          <li class=" list-group-item  text-capitalize" style="list-style:none;">
            <b> Current Status </b>
            <a class="float-right" id="current_status"></a>
          </li>
        </ul>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
$(function() {

  // let date_now = new Date().toLocaleDateString();
  let date_now = new Date().toISOString().slice(0, 10); // 2021-04-03
  // console.log(date_now);

  $('#datepicker').datepicker({
    todayBtn: 'linked',
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
    showOnFocus: true,
    // defaultDate: date_now,
  });
  $("#from_date").datepicker().datepicker('setDate', new Date());

  load_data();

  function load_data(from_date = '', to_date = '') {
    var tables = $("#LogDataTable").DataTable({
      "autoWidth": true,
    "responsive": true,
    dom: 'lBfrtip',
    buttons: [
      // 'excel', 'print'
      // { "extend": 'pageLength', "className": 'btn btn-default btn-sm px-4' },
      {
        "extend": 'excel',
        "text": 'Export',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      },
      {
        "extend": 'print',
        "text": 'Print',
        "className": 'btn btn-default btn-sm px-4 mx-1'
      }
    ],
      processing: true,
      serverSide: true,
      ajax: {
        url: "<?php echo e(route('Visitor-Log-Show')); ?>",
        data: {
          from_date: from_date,
          to_date: to_date
        }
      },
      columns: [{
          data: 'visit_time'
        },
        {
          data: 'client_id'
        },
        {
          data: 'visitor_name'
        },
        {
          data: 'visitor_mobile'
        },
        {
          data: 'visitor_type'
        },
        {
          data: 'company_name'
        },
        {
          data: 'visitor_purpose'
        },
        {
          data: 'visitor_note'
        },
        {
          data: 'action'
        }
      ]
    });
  }


  $("#client_id").select2({
    theme: "classic",
  });
  $("#employee_id").select2({
    theme: "classic",
  });

  $("#clients_id").select2({
    theme: "classic",
  });
  $("#employees_id").select2({
    theme: "classic",
  });

  $('#filter').click(function() {
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();

    if (from_date != '' && to_date != '') {
      $('#LogDataTable').DataTable().destroy();
      load_data(from_date, to_date);
    } else {
      alert('Both Date is required');
    }
  });

});

function LogStore() {

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
  if ($('#employee_id option:selected').text() == 'Select') {
    $("#show_error").removeClass().html('');
    $("#show_error").show().addClass('alert alert-danger').html('The attended by field is required.');
    return false;
  } else {
    $("#show_error").removeClass().html('').hide();
  }
  // console.log('rechaed');
  // return false;
  let form_data = document.getElementById("LogStoreForm");
  let new_data = new FormData(form_data);

  $("#btnSubmit").prop("disabled", true);
  $.ajax({
    type: "POST",
    url: "<?php echo e(route('Visitor-Log-Store')); ?>",
    data: new_data,
    processData: false,
    contentType: false,
    error: function(jqXHR, textStatus, errorThrown) {
      $("#btnSubmit").prop("disabled", false);
      $("#show_error").removeClass().html('').show();
      $("#show_error").addClass("alert alert-danger").html(errorThrown);
      return false;
    },
    success: function(data) {
      $("#btnSubmit").prop("disabled", false);
      console.log(data);
      // return false;
      if (data["success"] == true) {
        $("#show_error").removeClass().html('').show();
        $("#show_error").addClass("alert alert-success").html(data['message']);
        setTimeout(() => {
          $("#LogStoreModal").modal("hide");
          $("#show_error").removeClass().html('').hide();
          $("#LogStoreForm")[0].reset();
          let tables = $("#LogDataTable").dataTable();
          tables.fnPageChange('first', 1);
          location.reload();
        }, 2000);
      } else {
        if (data["validation"] == false) {
          $("#show_error").removeClass().html('').show();
          $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
          return false;
        }
        $("#show_error").removeClass().html('').show();
        $("#show_error").addClass("alert alert-danger").html(data['message']);
        return false;
      }
    }
  });
}
var base_url = "<?php echo e(url('/')); ?>";

function VisitorEdit(visitor_id) {
  var url_edit = base_url + "/Admin/Visitor-Log-" + visitor_id + "-Edit";
  // console.log("# "+visitor_id);return false;
  $.get(url_edit, function(data) {
    // console.log(data);
    // return false;

    $("#visitors_id").val(visitor_id);
    $("#visitors_type").val(data[0]['visitor_type']);
    $("#visits_time").val(data[0]['visit_time']);
    // $("#clients_id").val(data[0]['client_id']);
    $("#clients_id option[value='" + data[0]['client_id'] + "']").attr('selected', 'selected')
    $("#visitors_name").val(data[0]['visitor_name']);
    $("#visitors_mobile").val(data[0]['visitor_mobile']);
    $("#employees_id").val(data[0]['employee_id']);
    $("#visitors_purpose").val(data[0]['visitor_purpose']);
    $("#visitors_note").val(data[0]['visitor_note']);
    // $("#attachments_file").val(data[0]['uom_code']);

    if (data[0]['visitor_type'] == 'Visitor') {
      $("#visitors_type option[value='Visitor']").attr('selected', 'selected');
    } else {
      $("#visitors_type option[value='Call']").attr('selected', 'selected');
    }

    $("#LogEditModal").modal('show');
  });
}

function LogUpdate() {
  var fields = $("input[class*='log_input']");
  // console.log(fields.val());
  for (let i = 0; i <= fields.length; i++) {
    // console.log(fields);
    if ($(fields[i]).val() === '') {
      var currentElement = $(fields[i]).attr('name');
      var value = currentElement.replaceAll('_', ' ');
      $("#edit_show_error").removeClass().html('');
      $("#edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
        ' field is required.');
      return false;
    } else {
      $("#edit_show_error").hide().removeClass().html('');
    }
  }

  $("#btnUpdate").prop("disabled", true);
  $.ajax({
    type: "POST",
    url: "<?php echo e(route('Visitor-Log-Update')); ?>",
    data: $("#EditStoreForm").serialize(),
    error: function(jqXHR, textStatus, errorThrown) {
      $("#btnUpdate").prop("disabled", false);
      $("#edit_show_error").removeClass().html('').show();
      $("#edit_show_error").addClass("alert alert-danger").html(errorThrown);
      return false;
    },
    success: function(data) {
      $("#btnUpdate").prop("disabled", false);
      console.log(data);
      // return false;
      if (data["success"] == true) {
        $("#edit_show_error").removeClass().html('').show();
        $("#edit_show_error").addClass("alert alert-success").html(data['message']);
        setTimeout(() => {
          $("#LogEditModal").modal('hide');
          $("#EditStoreForm")[0].reset();
          $("#edit_show_error").removeClass().html('').hide();
          tables = $("#LogDataTable").dataTable();
          tables.fnPageChange('first', 1);
        }, 2000);
      } else {
        if (data["validation"] == false) {
          $("#show_error").removeClass().html('').show();
          $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
          return false;
        }
        $("#edit_show_error").removeClass().html('').show();
        $("#edit_show_error").addClass("alert alert-danger").html(data['message']);
        return false;
      }
    }
  });
}

function VisitorView(department_id) {
  var url_edit = base_url + "/Admin/Visitor-Log-" + department_id + "-View";
  // console.log("# "+url_edit);return false;
  $.get(url_edit, function(data) {
    console.log(data[0]);
    return false;

    $("#name_view").text(data[0]['visit_time']);
    $("#code_view").text(data[0]['visitor_type']);
    $("#location_view").text(data[0]['client_id']);
    $("#description_view").text(data[0]['visitor_name']);
    $("#supervised_view").text(data[0]['first_name'] + " " + data[0]['middle_name'] + " " + data[0]['last_name']);
    $("#site_view").text(data[0]['visitor_purpose']);
    $("#created_at").text(data[0]['visitor_note']);
    $("#updated_at").text(data[0]['updated_at']);

    if (data[0]['exclude_from_floor_load'] == 1) {
      $("#exclude_view").text('True');
    } else {
      $("#exclude_view").text('False');
    }
    if (data[0]['status'] == 1) {
      $("#current_status").text('Active');
    } else {
      $("#current_status").text('Inactive');
    }

    $("#DepartmentViewModal").modal('show');
  });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Visitor/Visitor.blade.php ENDPATH**/ ?>