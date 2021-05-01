<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">UOM</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#UOMStoreModal">Add</button>
                            <div class="modal fade" id="UOMStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add UOM</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="UOMStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="uom_name" name="uom_name" autocomplete=" off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Code</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="uom_code" name="uom_code" autocomplete="off">
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
                                            <button type="button" id="btnSubmit" onclick="UOMStore()"
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
        <!-- <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">UOM List</h6>
    </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="UOMDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UOMEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update UOM</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="UOMEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="" id="uoms_id" name="uom_id">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input type="text" class="form-control form-control-user border-primary uom_input "
                            id="uoms_name" name="uom_name" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>Code</lable>
                        <input type="text" class="form-control form-control-user border-primary uom_input"
                            id="uoms_code" name="uom_code" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Code</lable>
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
                        <span id="uom_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="UOMUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="UOMViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">UOM</h4>
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

    var tables = $("#UOMDataTable").DataTable({
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('UOM-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'uom_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'uom_name',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'uom_code',
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

function UOMStore() {
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
        url: "<?php echo e(route('UOM-Store')); ?>",
        data: $("#UOMStoreForm").serialize(),
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
                    $("#UOMStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#UOMStoreForm")[0].reset();
                    tables = $("#UOMDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#show_error").removeClass().show().html('');
                    $("#show_error").addClass("alert alert-danger").html(data['message'][
                        0
                    ]);
                    return false;
                }
                $("#show_error").removeClass().html('').show();
                $("#show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function UOMEdit(uom_id) {
    var url_edit = base_url + "/Admin/UOM-" + uom_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#uoms_id").val(data[0]['uom_id']);
        $("#uoms_name").val(data[0]['uom_name']);
        $("#uoms_code").val(data[0]['uom_code']);

        if (data[0]['status'] == 1) {
            $("#StatusSelector option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelector option[value='0']").attr('selected', 'selected');
        }

        $("#UOMEditModal").modal('show');
    });
}

function UOMView(uom_id) {
    var url_edit = base_url + "/Admin/UOM-" + uom_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#name_view").text(data[0]['uom_name']);
        $("#code_view").text(data[0]['uom_code']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#current_status").text('Active');
        } else {
            $("#current_status").text('Inactive');
        }

        $("#UOMViewModal").modal('show');
    });
}

function UOMUpdate() {
    var fields = $("input[class*='uom_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#uom_edit_show_error").removeClass().html('');
            $("#uom_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#uom_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('UOM-Update')); ?>",
        data: $("#UOMEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#uom_edit_show_error").removeClass().html('').show();
            $("#uom_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            // console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#uom_edit_show_error").removeClass().html('').show();
                $("#uom_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#UOMEditModal").modal('hide');
                    $("#UOMEditForm")[0].reset();
                    $("#uom_edit_show_error").removeClass().html('').hide();
                    tables = $("#UOMDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#uom_edit_show_error").removeClass().show().html('');
                    $("#uom_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#uom_edit_show_error").removeClass().html('').show();
                $("#uom_edit_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function UOMRemove(uom_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('UOM-Remove')); ?>", {
                uom_id: uom_id
            }, function(data) {
                // console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! UOM has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let UOMDataTable = $("#UOMDataTable").dataTable();
                    UOMDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty-main\resources\views/Setup/UOM.blade.php ENDPATH**/ ?>