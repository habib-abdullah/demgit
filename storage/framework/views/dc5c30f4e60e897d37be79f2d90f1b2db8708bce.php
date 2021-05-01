<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Items Size</div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#SizeStoreModal">Add Size</button>
                            <div class="modal fade" id="SizeStoreModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Size for Items</h4>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form id="SizeStoreForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <lable>Size Title</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required "
                                                        id="size_title" name="size_title" autocomplete=" off"
                                                        placeholder="Enter size title">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Description</lable>
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary required"
                                                        id="size_description" name="size_description" autocomplete="off"
                                                        placeholder="Enter size description">
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
                                            <button type="button" id="btnSubmit" onclick="SizeStore()"
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
                <table id="SizeDataTable" class="table table-bordered" width="100%" cellspacing="0">
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

<div class="modal fade" id="SizeEditModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Items Size</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="SizeEditForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="" id="sizes_id" name="size_id">
                    <div class="form-group">
                        <lable>Size Title</lable>
                        <input type="text" class="form-control form-control-user border-primary size_input "
                            id="sizes_title" name="size_title" autocomplete=" off" placeholder="Enter size title">
                    </div>
                    <div class="form-group">
                        <lable>Description</lable>
                        <input type="text" class="form-control form-control-user border-primary size_input"
                            id="sizes_description" name="size_description" autocomplete="off"
                            placeholder="Enter size description">
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
                        <span id="size_edit_show_error" style="display: none;" class="m-auto"></span>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="visitor_error_area" style="display: none;" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnUpdate" onclick="SizeUpdate()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="SizeViewModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Size for items</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <ul class="list-group">
                    <li class=" list-group-item  text-capitalize" style="list-style:none;">
                        <b> Size title </b>
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

    var tables = $("#SizeDataTable").DataTable({
        "autoWidth": true,
        "responsive": true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'print'
        ],
        "processing": true,
        "serverSide": true,
        ajax: {
            url: "<?php echo e(route('Size-Show')); ?>",
            // data: {
            //   client_id: ""
            // }
        },
        columns: [{
                data: 'size_id',
                'searchable': false,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'size_title',
                'searchable': true,
                'orderable': false,
                'class': 'text-center'
            },
            {
                data: 'size_description',
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

function SizeStore() {
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
        url: "<?php echo e(route('Size-Store')); ?>",
        data: $("#SizeStoreForm").serialize(),
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
                    $("#SizeStoreModal").modal('hide');
                    $("#show_error").removeClass().html('').hide();
                    $("#SizeStoreForm")[0].reset();
                    tables = $("#SizeDataTable").dataTable();
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

function SizeEdit(size_id) {
    var url_edit = base_url + "/Admin/Size-" + size_id + "-Edit";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        console.log(data[0]);
        // return false;
        // 
        $("#sizes_id").val(data[0]['size_id']);
        $("#sizes_title").val(data[0]['size_title']);
        $("#sizes_description").val(data[0]['size_description']);

        if (data[0]['status'] == 1) {
            $("#StatusSelectors option[value='1']").attr('selected', 'selected');
        } else {
            $("#StatusSelectors option[value='0']").attr('selected', 'selected');
        }

        $("#SizeEditModal").modal('show');
    });
}

function SizeView(size_id) {
    var url_edit = base_url + "/Admin/Size-" + size_id + "-View";
    // console.log("# "+url_edit);return false;
    $.get(url_edit, function(data) {
        // console.log(data[0]);
        // return false;

        $("#title_view").text(data[0]['size_title']);
        $("#description_view").text(data[0]['size_description']);
        $("#created_at").text(data[0]['created_at']);
        $("#updated_at").text(data[0]['updated_at']);

        if (data[0]['status'] == 1) {
            $("#status_view").text('Active');
        } else {
            $("#status_view").text('Inactive');
        }

        $("#SizeViewModal").modal('show');
    });
}

function SizeUpdate() {
    var fields = $("input[class*='size_input']");
    // console.log(fields.val());
    for (let i = 0; i <= fields.length; i++) {
        // console.log(fields);
        if ($(fields[i]).val() === '') {
            var currentElement = $(fields[i]).attr('name');
            var value = currentElement.replaceAll('_', ' ');
            $("#size_edit_show_error").removeClass().html('');
            $("#size_edit_show_error").show().addClass('alert alert-danger').html('The ' + value +
                ' field is required.');
            return false;
        } else {
            $("#size_edit_show_error").hide().removeClass().html('');
        }
    }

    $("#btnUpdate").prop("disabled", true);
    $.ajax({
        type: "POST",
        url: "<?php echo e(route('Size-Update')); ?>",
        data: $("#SizeEditForm").serialize(),
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btnUpdate").prop("disabled", false);
            $("#size_edit_show_error").removeClass().html('').show();
            $("#size_edit_show_error").addClass("alert alert-danger").html(errorThrown);
            return false;
        },
        success: function(data) {
            $("#btnUpdate").prop("disabled", false);
            console.log(data);
            // return false;
            if (data["success"] == true) {
                $("#size_edit_show_error").removeClass().html('').show();
                $("#size_edit_show_error").addClass("alert alert-success").html(data['message']);
                setTimeout(() => {
                    $("#SizeEditModal").modal('hide');
                    $("#SizeEditForm")[0].reset();
                    $("#size_edit_show_error").removeClass().html('').hide();
                    let SizeDataTable = $("#SizeDataTable").dataTable();
                    SizeDataTable.fnPageChange('first', 1);
                }, 2000);
            } else {
                if (data['validation'] == false) {
                    $("#size_edit_show_error").removeClass().show().html('');
                    $("#size_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                    return false;
                }
                $("#size_edit_show_error").removeClass().html('').show();
                $("#size_edit_show_error").addClass("alert alert-danger").html(data['message'][0]);
                return false;
            }
        }
    });
}

function SizeRemove(size_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Size-Remove')); ?>", {
                size_id: size_id
            }, function(data) {
                console.log(data);
                // return false;
                if (data['success'] == true) {
                    swal("Poof! Size for items has been deleted!", {
                        icon: "success",
                    });
                    //toastr.success('Employee Bank Detail Removed Successfully..')
                    let SizeDataTable = $("#SizeDataTable").dataTable();
                    SizeDataTable.fnPageChange('first', 1);
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchisty\resources\views/Inventory/Size.blade.php ENDPATH**/ ?>