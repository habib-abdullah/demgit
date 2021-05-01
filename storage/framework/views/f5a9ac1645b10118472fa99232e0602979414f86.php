<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Sites</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#CompanyStoreModal">Add Company Site</button>

                            <!-- Main Company Store -->
                            <div class="modal fade" id="CompanyStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Company Site</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="CompanyStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Site Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="site_name" name="site_name" autocomplete=" off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Site Mobile</lable>
                                                    <input type="number"
                                                        class="form-control form-control-user border-primary required"
                                                        id="site_mobile" name="site_mobile" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Site Address</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="site_address" name="site_address" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Longitude</lable>
                                                    <input type="number"
                                                        class="form-control form-control-user border-primary required"
                                                        id="site_longitude" name="site_longitude" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Latitude</lable>
                                                    <input type="number"
                                                        class="form-control form-control-user border-primary required"
                                                        id="site_latitude" name="site_latitude" autocomplete="off">
                                                </div>

                                            </form>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <div class="form-group text-center">
                                                <span id="show_error" style="display: none;" class="m-auto"></span>
                                            </div>
                                            <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" onclick="CompanyStore()"
                                                class="btn btn-primary">Add Site</button>
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
                <table id="CompanySiteTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Site Name</th>
                            <th>Site Contact</th>
                            <th>Site Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CompanyEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Company Site</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="CompanyEditForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" id="site_id" name="site_id" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Site Name</lable>
                        <input type="text" class="form-control form-control-user border-primary validation"
                            id="edit_name" name="edit_name" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Site Mobile</lable>
                        <input type="number" class="form-control form-control-user border-primary validation"
                            id="edit_mobile" name="edit_mobile" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Site Address</lable>
                        <input type="text" class="form-control form-control-user border-primary validation"
                            id="edit_address" name="edit_address" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Longitude</lable>
                        <input type="number" class="form-control form-control-user border-primary validation"
                            id="edit_longitude" name="edit_longitude" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Longitude</lable>
                        <input type="number" class="form-control form-control-user border-primary validation"
                            id="edit_latitude" name="edit_latitude" autocomplete="off">
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
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="form-group text-center">
                    <span id="department_edit_show_error" style="display: none;" class="m-auto"></span>
                </div>
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" onclick="CompanyUpdate()" class="btn btn-primary">Update
                    Site</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="CompanyViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Site Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <!-- <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Site ID </b>
                        <a class="float-right" id="id_view"></a>
                    </li> -->
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Site Name </b>
                        <a class="float-right" id="name_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Site Contact </b>
                        <a class="float-right" id="mobile_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Site Address </b>
                        <a class="float-right" id="address_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Longitude </b>
                        <a class="float-right" id="longitude_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Latitude </b>
                        <a class="float-right" id="latitude_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Status </b>
                        <a class="float-right" id="status_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Created At </b>
                        <a class="float-right" id="create_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Updated At </b>
                        <a class="float-right" id="update_view"></a>
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

    var tables = $("#CompanySiteTable").DataTable({
        "processing": true,
        "serverSide": true,
        ajax: "<?php echo e(url('Admin/CompanySite-Show')); ?>",
        columns: [{
                data: 'site_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'site_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'site_mobile',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'site_address',
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

});

// main CompanyStore 
function CompanyStore() {
    var fields = $("input[class*='required']");
    console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
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
        url: "<?php echo e(url('Admin/Company-Store')); ?>",
        data: $("#CompanyStoreForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnSubmit").prop("disabled", false);
            $("#show_error").removeClass().html('').show();
            $("#show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnSubmit").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#CompanyStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#CompanyStoreForm")[0].reset();
                    tables = $("#CompanySiteTable").dataTable();
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
// main CompanyStore 

// main Company Edit
function CompanyEdit(site_id) {
    var url_edit = base_url + "/Admin/Company-" + site_id + "-Edit";
    $.get(url_edit, function(data) {
        $("#site_id").val(data[0]['site_id']);
        $("#edit_name").val(data[0]['site_name']);
        $("#edit_mobile").val(data[0]['site_mobile']);
        $("#edit_address").val(data[0]['site_address']);
        $("#edit_longitude").val(data[0]['longitude']);
        $("#edit_latitude").val(data[0]['latitude']);
        $("#CompanyEditModal").modal('show');

        if (data[0]['status'] == 1) {
            $("#StatusSelector option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelector option[value='0']").attr('selected', 'selected');
        }
    });
}
// main Company Edit

function CompanyView(site_id) {
    var url_edit = base_url + "/Admin/Company-" + site_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;
        // $("#id_view").text(data[0]['site_id']);
        $("#name_view").text(data[0]['site_name']);
        $("#mobile_view").text(data[0]['site_mobile']);
        $("#address_view").text(data[0]['site_address']);
        $("#longitude_view").text(data[0]['longitude']);
        $("#latitude_view").text(data[0]['latitude']);
        $("#status_view").text(data[0]['status']);
        $("#create_view").text(data[0]['created_at']);
        $("#update_view").text(data[0]['updated_at']);
        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#CompanyViewModal").modal('show');
    });
}

function CompanyUpdate() {
    var fields = $("input[class*='validation']");
    console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#department_edit_show_error").removeClass().html('');
            $("#department_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            // return false;
        } else {
            $("#department_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Comapny-Update')); ?>",
        data: $("#CompanyEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#department_edit_show_error").removeClass().html('').show();
            $("#department_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#department_edit_show_error").removeClass().html('').show();
                $("#department_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#CompanyEditModal").modal('hide');
                    $("#CompanyEditForm")[0].reset();
                    $("#department_edit_show_error").removeClass().html('').hide();
                    tables = $("#CompanySiteTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
                return false;
            } else {
                if (data['validation'] == false) {
                    $("#department_edit_show_error").removeClass().show().html('');
                    $("#department_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#Department").removeClass().html('').show();
                $("#department_edit_show_error").addClass("alert alert-danger").html(data['message']);
            }
        }
    });
}

function CompanyRemove(site_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Company-Remove')); ?>", {
                site_id: site_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Company has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let DepartmentDataTable = $("#CompanySiteTable").dataTable();
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/CompanySite/Comapnysite.blade.php ENDPATH**/ ?>