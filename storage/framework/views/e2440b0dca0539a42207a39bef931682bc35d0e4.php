<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Department</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#DepartmentStoreModal">Add Department</button> 

                            <div class="modal fade" id="DepartmentStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Department</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="DepartmentStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="department_name" name="department_name" autocomplete=" off" placeholder="Enter department name">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Code</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="department_code" name="department_code" autocomplete="off" placeholder="Enter department code">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Location</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="department_location" name="department_location"
                                                        autocomplete="off" placeholder="Enter department Location">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="department_decription" name="department_decription"
                                                        autocomplete="off" placeholder="Enter department Description">
                                                </div>
                                                <div class="form-group ">
                                                    <lable>Supervised By</lable>
                                                    <select class="form-control select2 "
                                                        name="department_supervised_by" id="department_supervised_by"
                                                        style="width: 100%;">
                                                        <option selected="selected" disabled>Select</option>
                                                        <?php if(count($employees) > 0): ?>
                                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($employee->employee_id); ?>">
                                                            <?php echo e($employee->first_name); ?>

                                                            <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Exclude from floor load</lable>
                                                    <select class="form-control" name="exclude_from_floor_load"
                                                        id="exclude_from_floor_load">
                                                        <option value="1">True</option>
                                                        <option value="0">False</option>
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
                                            <button type="button" id="btnSubmit" onclick="DepartmentStore()"
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
                <table id="DepartmentDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Supervised By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DepartmentEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Department</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="DepartmentEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="departments_id" name="department_id">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" class="form-control form-control-user border-primary department_input "
                            id="departments_name" name="department_name" autocomplete=" off" placeholder="Enter department name">
                    </div>
                    <div class="form-group">
                        <lable>Code</lable>
                        <input type="text" class="form-control form-control-user border-primary department_input"
                            id="departments_code" name="department_code" autocomplete="off" placeholder="Enter department Code">
                    </div>
                    <div class="form-group">
                        <lable>Location</lable>
                        <input type="text" class="form-control form-control-user border-primary department_input"
                            id="departments_location" name="department_location" autocomplete="off" placeholder="Enter department Location">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary department_input"
                            id="departments_decription" name="department_decription" autocomplete="off" placeholder="Enter department Description">
                    </div>
                    <div class="form-group ">
                        <lable>Supervised By</lable>
                        <select class="form-control select2 " name="department_supervised_by"
                            id="departments_supervised_by" style="width: 100%;">
                            <option>Select</option>
                            <?php if(count($employees) > 0): ?>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($employee->employee_id); ?>"><?php echo e($employee->first_name); ?>

                                <?php echo e($employee->middle_name); ?> <?php echo e($employee->last_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Exclude from floor load</lable>
                        <select class="form-control" name="exclude_from_floor_load" id="excludes_from_floor_load">
                            <option value="1">True</option>
                            <option value="0">False</option>
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
                        <select class="form-control" name="StatusSelector" id="StatusSelector">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="department_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="DepartmentUpdate()"
                    class="btn btn-primary">Update</button>
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

<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

    var tables = $("#DepartmentDataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Department-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'department_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'department_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'department_code',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'department_location',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'department_decription',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'employee_name', //from employee__personal_detail
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'status',
                render: function(data) {
                    if (data == 1) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                },
                'searchable': false,
                'orderable': false,
                'class': 'text-center',
            },
            {
                data: 'action',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            }
        ]
    });

    $("#department_supervised_by").select2({
        theme: "classic",
        // width: 'resolve'
    });

});

function DepartmentStore() {
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
        url: "<?php echo e(route('Department-Store')); ?>",
        data: $("#DepartmentStoreForm").serialize(),
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
                    $("#DepartmentStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#DepartmentStoreForm")[0].reset();
                    tables = $("#DepartmentDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().show().html('');
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

function DepartmentEdit(department_id) {
    var url_edit = base_url + "/Admin/Department-" + department_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#departments_id").val(data[0]['department_id']);
        $("#departments_name").val(data[0]['department_name']);
        $("#departments_code").val(data[0]['department_code']);
        $("#departments_location").val(data[0]['department_location']);
        $("#departments_decription").val(data[0]['department_decription']);
        $("#departments_supervised_by").val(data[0]['department_supervised_by']);

        if (data[0]['exclude_from_floor_load'] == 1) {
            $("#excludes_from_floor_load option[value='1']").attr('selected', 'selected');
        } else {
            $("#excludes_from_floor_load option[value='0']").attr('selected', 'selected');
        }
        if (data[0]['company_site'] == 'main_site') {
            $("#SiteSelectors option[value='main_site']").attr('selected', 'selected');
        } else {
            $("#SiteSelectors option[value='customer_site']").attr('selected', 'selected');
        }
        if (data[0]['status'] == 1) {
            $("#StatusSelector option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelector option[value='0']").attr('selected', 'selected');
        }

        $("#DepartmentEditModal").modal('show');
    });
}

function DepartmentView(department_id) {
    var url_edit = base_url + "/Admin/Department-" + department_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;

        $("#name_view").text(data[0]['department_name']);
        $("#code_view").text(data[0]['department_code']);
        $("#location_view").text(data[0]['department_location']);
        $("#description_view").text(data[0]['department_decription']);
        $("#supervised_view").text(data[0]['first_name'] + " " + data[0]['middle_name'] + " " + data[0][
            'last_name'
        ]);
        // $("#exclude_view").text(data[0]['exclude_from_floor_load']);
        $("#site_view").text(data[0]['company_site']);
        $("#created_at").text(data[0]['created_at']);
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

function DepartmentUpdate() {
    var fields = $("input[class*='department_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#department_edit_show_error").removeClass().html('');
            $("#department_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#department_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Department-Update')); ?>",
        data: $("#DepartmentEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#department_edit_show_error").removeClass().html('').show();
            $("#department_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#department_edit_show_error").removeClass().html('').show();
                $("#department_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#DepartmentEditModal").modal('hide');
                    $("#DepartmentEditForm")[0].reset();
                    $("#department_edit_show_error").removeClass().html('').hide();
                    tables = $("#DepartmentDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#department_edit_show_error").removeClass().show().html('');
                    $("#department_edit_show_error").addClass("alert alert-danger").html(data['message'][
                        0
                    ]);
                    return false;
                }
                $("#Department").removeClass().html('').show();
                $("#department_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function DepartmentRemove(department_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Department-Remove')); ?>", {
                department_id: department_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Department has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let DepartmentDataTable = $("#DepartmentDataTable").dataTable();
                    DepartmentDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/Setup/Department.blade.php ENDPATH**/ ?>