<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Items Grades</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#GradeStoreModal">Add Grades</button>
                            <div class="modal fade" id="GradeStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Grades for Items</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="GradeStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Grade Title</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="grade_title" name="grade_title" autocomplete=" off"
                                                        placeholder="Enter grade title">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="grade_description" name="grade_description"
                                                        autocomplete="off" placeholder="Enter grade description">
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
                                        <!-- Modal footer Grade -->
                                        <div class="modal-footer">
                                            <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" id="btnSubmit" onclick="GradeStore()"
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
                <table id="GradeDataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="GradeEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Items Grades</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="GradeEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="" id="grades_id" name="grade_id">
                    <div class="form-group">
                        <lable>Grade Title</lable>
                        <input type="text" class="form-control form-control-user border-primary grade_input "
                            id="grades_title" name="grade_title" autocomplete=" off" placeholder="Enter grade title">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary grade_input"
                            id="grades_description" name="grade_description" autocomplete="off"
                            placeholder="Enter grade description">
                    </div>
                    <div class="form-group">
                        <lable>Status</lable>
                        <select class="form-control" name="StatusSelector" id="StatusSelectors">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="form-row mt-3 mx-auto">
                    <div class="form-group text-center">
                        <span id="grade_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="GradeUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="GradeViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Grades for items</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Grade title </b>
                        <a class="float-right" id="title_view">asdsdfasdf</a>
                    </li>
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Description </b>
                        <a class="float-right" id="description_view"></a>
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

    var tables = $("#GradeDataTable").DataTable({
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
            url: "<?php echo e(route('Grades-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'grade_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'grade_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'grade_description',
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

function GradeStore() {
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
        url: "<?php echo e(route('Grades-Store')); ?>",
        data: $("#GradeStoreForm").serialize(),
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
                    $("#GradeStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#GradeStoreForm")[0].reset();
                    tables = $("#GradeDataTable").dataTable();
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

function GradeEdit(grade_id) {
    var url_edit = base_url + "/Admin/Grades-" + grade_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;
        // 
        $("#grades_id").val(data[0]['grade_id']);
        $("#grades_title").val(data[0]['grade_title']);
        $("#grades_description").val(data[0]['grade_description']);

        if (data[0]['status'] == 1) {
            $("#StatusSelectors option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelectors option[value='0']").attr('selected', 'selected');
        }

        $("#GradeEditModal").modal('show');
    });
}

function GradeView(grade_id) {
    var url_edit = base_url + "/Admin/Grades-" + grade_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#title_view").text(data[0]['grade_title']);
        $("#description_view").text(data[0]['grade_description']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#GradeViewModal").modal('show');
    });
}

function GradeUpdate() {
    var fields = $("input[class*='grade_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#grade_edit_show_error").removeClass().html('');
            $("#grade_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#grade_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Grades-Update')); ?>",
        data: $("#GradeEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#grade_edit_show_error").removeClass().html('').show();
            $("#grade_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#grade_edit_show_error").removeClass().html('').show();
                $("#grade_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#GradeEditModal").modal('hide');
                    $("#GradeEditForm")[0].reset();
                    $("#grade_edit_show_error").removeClass().html('').hide();
                    let GradeDataTable = $("#GradeDataTable").dataTable();
                    GradeDataTable.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#grade_edit_show_error").removeClass().show().html('');
                    $("#grade_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#grade_edit_show_error").removeClass().html('').show();
                $("#grade_edit_show_error").addClass("alert alert-danger").html(data['message']);
                return false;
            }
        }
    });
}

function GradeRemove(grade_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Grades-Remove')); ?>", {
                grade_id: grade_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Grade for items has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let GradeDataTable = $("#GradeDataTable").dataTable();
                    GradeDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/Inventory/Grades.blade.php ENDPATH**/ ?>