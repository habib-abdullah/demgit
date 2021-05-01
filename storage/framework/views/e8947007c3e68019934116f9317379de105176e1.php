<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Document Category</div>
                        </div>
                        <div class="col-auto">
                            <!-- <a href="<?php echo e(route('Employee-Document')); ?>" style="font-size: 18px;"><i
                                    class="fas fa-arrow-circle-left"></i> Back</a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal">Add Category</button>
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-primary">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Cateagory</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="CategoryForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="form-group">
                                                    <input type="text"
                                                        class="form-control form-control-user border-primary"
                                                        name="cat_name" id="cat_name" autocomplete="off" placeholder="Enter Document Cateagory">
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <span id="error_area" style="display: none;" class="m-auto"></span>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" id="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="DataTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>EID</th>
                            <th>Designation Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="desigModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-primary">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Designation role</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="DesignationUpdate">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <span id="update_error_area" class="m-auto"></span>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="update" class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</div>
<script src="<?php echo e(url('public/plugins/jquery/jquery.min.js')); ?>"></script>

<script type="text/javascript">
$(function() {
    var tables = $("#DataTable").DataTable({
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
        ajax: "<?php echo e(route('Document-Category-Show')); ?>",
        columns: [{
                data: 'category_id',
                "orderable": true,
                "searchable": false,
                "class": 'text-center',
            },
            {
                data: 'category_name',
                "orderable": false,
                "searchable": true,
            },
            {
                data: 'action',
                "orderable": false,
                "searchable": false,
                "class": 'text-center',
            }
        ]
    });
});
$('#submit').click(function() {
    var Dname_err = true;

    var cat_name = $('#cat_name').val();
    if (cat_name == '') {
        $('#error_area').removeClass().html('');
        $('#error_area').addClass('alert alert-danger text-center').show().html('Please enter category name');
        return false;
    } else {
        $('#error_area').hide();
    }
    $.ajax({

        type: "POST",
        url: "<?php echo e(route('Document-Category-Store')); ?>",
        data: $("#CategoryForm").serialize(),
        success: function(data) {
            console.log(data);
            if (data["success"] == true) {
                $('#error_area').removeClass().html('');
                $('#error_area').addClass('alert alert-success text-center').show().html(data[
                    "message"]);
                setTimeout(function() {
                    $("#myModal").modal('hide')
                }, 2000);
                tables = $("#DataTable").dataTable();
                tables.fnPageChange('first', 1);
            } else {
                $('#error_area').removeClass().html('');
                $('#error_area').addClass('alert alert-danger text-center').show().html(data[
                    "message"]);
                return false;
            }
        }
    });
});

function DocumentCategoryRemove(category_id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.get("<?php echo e(route('Document-Category-Remove')); ?>", {
                category_id: category_id
            }, function(data) {
                console.log(data);
                if (data['success'] == true) {
                    swal("Poof! Category has been deleted!", {
                        icon: "success",
                    });
                    tables = $("#DataTable").dataTable();
                    tables.fnPageChange('first', 1);
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

function DesignationEdit(id) {
    $.get("<?php echo e(url('Admin/DesignationEdit')); ?>", {
        id: id
    }, function(data) {
        console.log(data);
        $('#DesignationUpdate').html(data);
    });
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alchishty\resources\views/EmployeeMaster/DocumentCategory.blade.php ENDPATH**/ ?>