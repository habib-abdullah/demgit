<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Operation</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#OperationStoreModal">Add</button>

                            <div class="modal fade" id="OperationStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Operation</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="OperationStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="operation_name" name="operation_name" autocomplete=" off"
                                                        placeholder="Enter operation name">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Code</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="operation_code" name="operation_code" autocomplete="off"
                                                        placeholder="Enter operation code">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Title</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="operation_title" name="operation_title" autocomplete=" off"
                                                        placeholder="Enter operation title ">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="operation_description" name="operation_description"
                                                        autocomplete="off" placeholder="Enter operation description">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Hour Rate</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="operation_hour_rate" name="operation_hour_rate"
                                                        autocomplete=" off" placeholder="Enter operation our rate">
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
                                            <button type="button" id="btnSubmit" onclick="OperationStore()"
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
                <table id="OperationDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Hour Rate</th>
                            <th>Site</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="OperationEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Operation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="OperationEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="operation_id" name="operation_id">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" class="form-control form-control-user border-primary operation_input "
                            id="operations_name" name="operation_name" autocomplete=" off"
                            placeholder="Enter operation name">
                    </div>
                    <div class="form-group">
                        <lable>Code</lable>
                        <input type="text" class="form-control form-control-user border-primary operation_input"
                            id="operations_code" name="operation_code" autocomplete="off"
                            placeholder="Enter operation code">
                    </div>
                    <div class="form-group">
                        <lable>Title</lable>
                        <input type="text" class="form-control form-control-user border-primary operation_input "
                            id="operations_title" name="operation_title" autocomplete=" off"
                            placeholder="Enter operation title ">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary operation_input"
                            id="operations_description" name="operation_description" autocomplete="off"
                            placeholder="Enter operation description">
                    </div>
                    <div class="form-group">
                        <lable>Hour Rate</lable>
                        <input type="text" class="form-control form-control-user border-primary operation_input "
                            id="operations_hour_rate" name="operation_hour_rate" autocomplete=" off"
                            placeholder="Enter operation our rate">
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
                        <span id="operation_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="OperationUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="OperationViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Operation</h4>
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
                        <b> Description </b>
                        <a class="float-right" id="description_view"></a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Hour Rate </b>
                        <a class="float-right" id="hour_view"></a>
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

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

    var tables = $("#OperationDataTable").DataTable({
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Operation-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'operation_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'operation_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'operation_code',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'operation_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'operation_description',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'operation_hour_rate',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'company_site',
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

});

function OperationStore() {
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
        url: "<?php echo e(route('Operation-Store')); ?>",
        data: $("#OperationStoreForm").serialize(),
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
                    $("#OperationStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#OperationStoreForm")[0].reset();
                    let OperationDataTable = $("#OperationDataTable").dataTable();
                    OperationDataTable.fnPageChange('first', 1);
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

function OperationEdit(operation_id) {
    var url_edit = base_url + "/Admin/Operation-" + operation_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#operation_id").val(data[0]['operation_id']);
        $("#operations_name").val(data[0]['operation_name']);
        $("#operations_code").val(data[0]['operation_code']);
        $("#operations_title").val(data[0]['operation_title']);
        $("#operations_description").val(data[0]['operation_description']);
        $("#operations_hour_rate").val(data[0]['operation_hour_rate']);

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

        $("#OperationEditModal").modal('show');
    });
}

function OperationView(operation_id) {
    var url_edit = base_url + "/Admin/Operation-" + operation_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#name_view").text(data[0]['operation_name']);
        $("#code_view").text(data[0]['operation_code']);
        $("#title_view").text(data[0]['operation_title']);
        $("#description_view").text(data[0]['operation_description']);
        $("#hour_view").text(data[0]['operation_hour_rate']);
        $("#site_view").text(data[0]['company_site']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#current_status").text('Active');
        } else {
            $("#current_status").text('Inactive');
        }

        $("#OperationViewModal").modal('show');
    });
}

function OperationUpdate() {
    var fields = $("input[class*='operation_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#operation_edit_show_error").removeClass().html('');
            $("#operation_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#operation_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Operation-Update')); ?>",
        data: $("#OperationEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#operation_edit_show_error").removeClass().html('').show();
            $("#operation_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#operation_edit_show_error").removeClass().html('').show();
                $("#operation_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#OperationEditModal").modal('hide');
                    $("#OperationEditForm")[0].reset();
                    $("#operation_edit_show_error").removeClass().html('').hide();
                    let OperationDataTable = $("#OperationDataTable").dataTable();
                    OperationDataTable.fnPageChange('first', 1);
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

function OperationRemove(operation_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Operation-Remove')); ?>", {
                operation_id: operation_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Operation has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let OperationDataTable = $("#OperationDataTable").dataTable();
                    OperationDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/Setup/Operation.blade.php ENDPATH**/ ?>