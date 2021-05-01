<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Machine</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#MachineStoreModal">Add Machine</button>

                            <div class="modal fade" id="MachineStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Machine</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="MachineStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="machine_name" name="machine_name" autocomplete=" off"
                                                        placeholder="Enter machine name">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Code</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="machine_code" name="machine_code" autocomplete="off"
                                                        placeholder="Enter machine code">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Title</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="machine_title" name="machine_title" autocomplete=" off"
                                                        placeholder="Enter machine title ">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Make</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="machine_make" name="machine_make" autocomplete="off"
                                                        placeholder="Enter machine make">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Model</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="machine_model" name="machine_model" autocomplete="off"
                                                        placeholder="Enter machine modal">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="machine_description" name="machine_description"
                                                        autocomplete="off" placeholder="Enter machine description">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Hour Rate</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="machine_hour_rate" name="machine_hour_rate"
                                                        autocomplete=" off" placeholder="Enter machine Hour rate">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Department</lable>
                                                    <select class="form-control select2" name="DepartmentSelector"
                                                        id="DepartmentSelector" style="width: 100%;">
                                                        <option selected disabled>Select</option>
                                                        <?php if(count($departments) > 0): ?>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($department->department_id); ?>">
                                                            <?php echo e($department->department_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Site</lable>
                                                    <select class="form-control" name="SiteSelector" id="SiteSelector">
                                                        <option value="main_site">Main Site</option>
                                                        <option value="customer_site">Work @ Customer Site</option>
                                                    </select>
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
                                            <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" onclick="MachineStore()"
                                                class="btn btn-primary">Submit</button>
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
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table id="MachineDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Hour Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MachineEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Machine</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="MachineEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="machine_id" name="machine_id">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input "
                            id="machines_name" name="machine_name" autocomplete=" off" placeholder="Enter machine name">
                    </div>
                    <div class="form-group">
                        <lable>Code</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input"
                            id="machines_code" name="machine_code" autocomplete="off" placeholder="Enter machine code">
                    </div>
                    <div class="form-group">
                        <lable>Title</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input "
                            id="machines_title" name="machine_title" autocomplete=" off"
                            placeholder="Enter machine title ">
                    </div>
                    <div class="form-group">
                        <lable>Make</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input"
                            id="machines_make" name="machine_make" autocomplete="off"
                            placeholder="Enter machine make">
                    </div>
                    <div class="form-group">
                        <lable>Model</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input"
                            id="machines_model" name="machine_model" autocomplete="off"
                            placeholder="Enter machine modal">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input"
                            id="machines_description" name="machine_description" autocomplete="off"
                            placeholder="Enter machine description">
                    </div>
                    <div class="form-group">
                        <lable>Hour Rate</lable>
                        <input type="text" class="form-control form-control-user border-primary machine_input "
                            id="machines_hour_rate" name="machine_hour_rate" autocomplete=" off"
                            placeholder="Enter machine Hour rate">
                    </div>
                    <div class="form-group">
                        <lable>Department</lable>
                        <select class="form-control select2" name="DepartmentSelectors" id="DepartmentSelectors"
                            style="width: 100%;">
                            <option disabled>Select</option>
                            <?php if(count($departments) > 0): ?>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($department->department_id); ?>"><?php echo e($department->department_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Site</lable>
                        <select class="form-control" name="SiteSelector" id="SiteSelectors">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Status</lable>
                        <select class="form-control" name="StatusSelectors" id="StatusSelectors">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="machine_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="MachineUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="MachineViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Machine</h4>
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
                        <b> Title </b>
                        <a class="float-right" id="title_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Make </b>
                        <a class="float-right" id="make_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Model </b>
                        <a class="float-right" id="model_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Description </b>
                        <a class="float-right" id="description_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Hour Rate </b>
                        <a class="float-right" id="hour_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Department </b>
                        <a class="float-right" id="department_view"></a>
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
                        <a class="float-right" id="status_view"></a>
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

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

    var tables = $("#MachineDataTable").DataTable({
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
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Machine-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'machine_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'machine_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'machine_code',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'machine_make',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'machine_model',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'machine_hour_rate',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

    $("#DepartmentSelector").select2({
        theme: "classic",
        // width: 'resolve'
    });

});

function MachineStore() {
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

    $("#btnSubmit").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Machine-Store')); ?>",
        data: $("#MachineStoreForm").serialize(),
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
                    $("#MachineStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#MachineStoreForm")[0].reset();
                    let MachineDataTable = $("#MachineDataTable").dataTable();
                    MachineDataTable.fnPageChange('first', 1);
                }, 2000);
            } else {
              if (data['validation'] == false) {
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function MachineEdit(machine_id) {
    var url_edit = base_url + "/Admin/Machine-" + machine_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#machine_id").val(data[0]['machine_id']);
        $("#machines_name").val(data[0]['machine_name']);
        $("#machines_code").val(data[0]['machine_code']);
        $("#machines_title").val(data[0]['machine_title']);
        $("#machines_make").val(data[0]['machine_make']);
        $("#machines_model").val(data[0]['machine_model']);
        $("#machines_description").val(data[0]['machine_description']);
        $("#machines_hour_rate").val(data[0]['machine_hour_rate']);
        $("#DepartmentSelectors").val(data[0]['department_id']);

        if (data[0]['status'] == 1) {
            $("#StatusSelectors option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelectors option[value='0']").attr('selected', 'selected');
        }
        if (data[0]['company_site'] == 'main_site') {
            $("#SiteSelectors option[value='main_site']").attr('selected', 'selected');
        } else {
            $("#SiteSelectors option[value='customer_site']").attr('selected', 'selected');
        }

        $("#MachineEditModal").modal('show');
    });
}

function MachineView(machine_id) {
    var url_edit = base_url + "/Admin/Machine-" + machine_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#name_view").text(data[0]['machine_name']);
        $("#code_view").text(data[0]['machine_code']);
        $("#title_view").text(data[0]['machine_title']);
        $("#make_view").text(data[0]['machine_make']);
        $("#model_view").text(data[0]['machine_model']);
        $("#description_view").text(data[0]['machine_description']);
        $("#hour_view").text(data[0]['machine_hour_rate']);
        $("#department_view").text(data[0]['department_name']);
        $("#site_view").text(data[0]['company_site']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#MachineViewModal").modal('show');
    });
}

function MachineUpdate() {
    var fields = $("input[class*='machine_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#machine_edit_show_error").removeClass().html('');
            $("#machine_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#machine_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Machine-Update')); ?>",
        data: $("#MachineEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#machine_edit_show_error").removeClass().html('').show();
            $("#machine_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#machine_edit_show_error").removeClass().html('').show();
                $("#machine_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#MachineEditModal").modal('hide');
                    $("#MachineEditForm")[0].reset();
                    $("#machine_edit_show_error").removeClass().html('').hide();
                    let MachineDataTable = $("#MachineDataTable").dataTable();
                    MachineDataTable.fnPageChange('first', 1);
                }, 2000);
            } else {
              if (data['validation'] == false) {
                    $("#machine_edit_show_error").removeClass().show().html('');
                    $("#machine_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#machine_edit_show_error").removeClass().html('').show();
                $("#machine_edit_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function MachineRemove(machine_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Machine-Remove')); ?>", {
                machine_id: machine_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! machine has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let MachineDataTable = $("#MachineDataTable").dataTable();
                    MachineDataTable.fnPageChange('first', 1);
                } else {
                    swal("Oops something went wrong, please check!", {
                        icon: "error",
                    });
                }
            });
        } else {
            swal("Your record is safe!");
        }
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Setup/Machine.blade.php ENDPATH**/ ?>