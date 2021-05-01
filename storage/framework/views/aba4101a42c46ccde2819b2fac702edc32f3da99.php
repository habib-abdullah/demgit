<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Working Hours</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ShiftStoreModal">Add Working Hours</button>
                            <div class="modal fade" id="ShiftStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Working Hours</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="ShiftStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Start At</lable>
                                                    <input type="time"
                                                        class="form-control form-control-user border-primary required "
                                                        id="shift_start" name="shift_start" autocomplete=" off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>End At</lable>
                                                    <input type="time"
                                                        class="form-control form-control-user border-primary required"
                                                        id="shift_end" name="shift_end" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Status</lable>
                                                    <select class="form-control" name="StatusSelector"
                                                        id="StatusSelector">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
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
                                            <button type="button" id="btnSubmit" onclick="ShiftStore()"
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
                <table id="ShiftDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Start At</th>
                            <th>End At</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ShiftEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Working Hours</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="ShiftEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="" id="shift_id" name="shift_id">
                    <div class="form-group">
                        <lable>Start At</lable>
                        <input type="time" class="form-control form-control-user border-primary shift_input "
                            id="shifts_start" name="shift_start" autocomplete=" off">
                    </div>
                    <div class="form-group">
                        <lable>End At</lable>
                        <input type="time" class="form-control form-control-user border-primary shift_input"
                            id="shifts_end" name="shift_end" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <lable>Status</lable>
                        <select class="form-control" name="StatusSelector" id="StatusSelectors">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Site</lable>
                        <select class="form-control" name="SiteSelector" id="SiteSelectors">
                            <option value="main_site">Main Site</option>
                            <option value="customer_site">Work @ Customer Site</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="shift_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="ShiftUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ShiftViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Working Hours</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Start At </b>
                        <a class="float-right" id="start_view">asdsdfasdf</a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> End At </b>
                        <a class="float-right" id="end_view"></a>
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

<script type="text/javascript">
var base_url = "<?php echo e(url('/')); ?>";
$(function() {

    var tables = $("#ShiftDataTable").DataTable({
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
            url: "<?php echo e(route('Shift-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'shift_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'shift_start',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'shift_end',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'created_at',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'updated_at',
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

function ShiftStore() {
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
        url: "<?php echo e(route('Shift-Store')); ?>",
        data: $("#ShiftStoreForm").serialize(),
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
                    $("#ShiftStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#ShiftStoreForm")[0].reset();
                    tables = $("#ShiftDataTable").dataTable();
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

function ShiftEdit(shift_id) {
    var url_edit = base_url + "/Admin/Shift-" + shift_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;
        // 
        $("#shift_id").val(data[0]['shift_id']);
        $("#shifts_start").val(data[0]['shift_start']);
        $("#shifts_end").val(data[0]['shift_end']);

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

        $("#ShiftEditModal").modal('show');
    });
}

function ShiftView(shift_id) {
    var url_edit = base_url + "/Admin/Shift-" + shift_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#start_view").text(data[0]['shift_start']);
        $("#end_view").text(data[0]['shift_end']);
        $("#site_view").text(data[0]['company_site']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#ShiftViewModal").modal('show');
    });
}

function ShiftUpdate() {
    var fields = $("input[class*='shift_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#shift_edit_show_error").removeClass().html('');
            $("#shift_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#shift_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Shift-Update')); ?>",
        data: $("#ShiftEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#shift_edit_show_error").removeClass().html('').show();
            $("#shift_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#shift_edit_show_error").removeClass().html('').show();
                $("#shift_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#ShiftEditModal").modal('hide');
                    $("#ShiftEditForm")[0].reset();
                    $("#shift_edit_show_error").removeClass().html('').hide();
                    tables = $("#ShiftDataTable").dataTable();
                    tables.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#shift_edit_show_error").removeClass().show().html('');
                    $("#shift_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#shift_edit_show_error").removeClass().html('').show();
                $("#shift_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function ShiftRemove(shift_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Shift-Remove')); ?>", {
                shift_id: shift_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Shift has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let ShiftDataTable = $("#ShiftDataTable").dataTable();
                    ShiftDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Setup/Shift.blade.php ENDPATH**/ ?>